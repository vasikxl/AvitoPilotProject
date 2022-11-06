<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class UserFactory
{
    public static function create(int $repeat)
    {
        $userIdArray = [];

        for ($i = 0; $i < $repeat; $i++) {
            $userIdArray[] = DB::table('users')
                ->insertGetId([
                    'name' => fake()->name(),
                    'slug' => fake()->unique()->slug(),
                    'email' => fake()->unique()->safeEmail(),
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
        }

        return $userIdArray;
    }
}
