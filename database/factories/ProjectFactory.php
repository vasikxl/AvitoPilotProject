<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class ProjectFactory
{
    public static function create(int $repeat, int $userId)
    {
        $projectIdArray = [];

        for ($i = 0; $i < $repeat; $i++) {
            $projectIdArray[] = DB::table('projects')
                ->insertGetId([
                    'user_id' => $userId,
                    'slug' => fake()->unique()->slug(),
                    'name' => fake()->unique()->sentence(),
                    'description' => fake()->paragraph(),
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
        }

        return $projectIdArray;
    }
}
