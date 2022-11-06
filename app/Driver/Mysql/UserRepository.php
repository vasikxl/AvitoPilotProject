<?php

namespace App\Driver\Mysql;

use App\User\UserItemInterface;
use App\User\UserRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserRepository implements UserRepositoryInterface
{
    /**
     * Ziska uzivatele dle jeho id.
     *
     * @param int $id
     * @return UserItemInterface user
     */
    public function getUserById(int $id) : UserItemInterface
    {
        $user = DB::table('users')
            ->where('id', '=', $id)
            ->get();

        return new UserItem($user->id, $user->slug, $user->name, $user->email, $user->password,
            $user->created_at, $user->updated_at);
    }

    /**
     * Ziska uzivatele dle jeho slugu.
     *
     * @param String $slug
     * @return UserItemInterface user
     */
    public function getUserBySlug(string $slug) : UserItemInterface
    {
        $user = DB::table('users')
            ->where('slug', '=', $slug)
            ->get()->first();

        return new UserItem($user->id, $user->slug, $user->name, $user->email, $user->password,
            $user->created_at, $user->updated_at);
    }

    /**
     * Vraci vsechny uzivatele.
     *
     * @return LengthAwarePaginator
     */
    public function getAllUsers() : LengthAwarePaginator
    {
        $users = DB::table('users')
            ->select('id', 'slug', 'name', 'email', 'password', 'created_at', 'updated_at')
            ->paginate();

        $users->getCollection()->transform(function ($user) {
            return new UserItem($user->id, $user->slug, $user->name, $user->email, $user->password,
                $user->created_at, $user->updated_at);
        });
        return $users;
    }

    /**
     * Vraci vsechny uzivatele dle jmena.
     *
     * @param String $name
     * @return LengthAwarePaginator
     */
    public function getAllUsersByName(String $name) : LengthAwarePaginator
    {
        $users = DB::table('users')
            ->where('name', 'like', "%$name%")
            ->paginate();

        $users->getCollection()->transform(function ($user) {
            return new UserItem($user->id, $user->slug, $user->name, $user->email, $user->password,
                $user->created_at, $user->updated_at);
        });

        return $users;
    }

    /**
     * Vytvori novy zaznam uzivatele.
     *
     * @param string $name
     * @param string $email
     * @param string $password
     * @return void
     */
    public function store(string $name, string $email, string $password) : void
    {
        $attributes = [
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'created_at' => now(),
            'updated_at' => now()
        ];
        $attributes['slug'] = Str::slug($attributes['name']);
        DB::table('users')
            ->insert($attributes);
    }

    /**
     * Aktualizuje zaznam dle id uzivatele.
     *
     * @param int $userId
     * @param string $name
     * @param string $email
     * @param string $password
     * @return void
     */
    public function update(int $userId, string $name, string $email, string $password) : void
    {
        DB::table('users')
            ->where('id', $userId)
            ->update([
                'name' => $name,
                'email' => $email,
                'password' => $password,
                'updated_at' => now()
            ]);
    }

    /**
     * Maze zaznam dle id uzivatele.
     *
     * @param int $userId
     * @return void
     */
    public function delete(int $userId) : void
    {
        DB::table('users')
            ->where('users.id', '=', $userId)
            ->delete();
    }
}
