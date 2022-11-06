<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'slug'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
    ];

    public function scopeSearch($query, array $filters) {
        if($filters["search"] ?? false) {
            $query
                ->where("name", "like", "%" . $filters["search"] . "%")
                ->orWhere("email", "like", "%" . $filters["search"] . "%");
        } else {
            $query;
        }
    }

    public function setPasswordAttribute($password) {
        $this->attributes["password"] = bcrypt($password);
    }

    public function setNameAttribute($name) {
        $this->attributes["slug"] = Str::slug($name, "-");
        $this->attributes["name"] = $name;
    }

    public function projects() {
        return $this->hasMany(\App\Models\Project::class);
    }

    public function tasks() {
        return $this->hasMany(\App\Models\Task::class);
    }

    public function comments() {
        return $this->hasMany(\App\Models\Comment::class);
    }

    public function taskChanges() {
        return $this->hasMany(\App\Models\TaskChange::class);
    }
}
