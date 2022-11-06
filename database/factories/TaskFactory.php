<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class TaskFactory
{
    public static function create(int $repeat, int $userId, int $projectId)
    {
        $taskIdArray = [];

        for ($i = 0; $i < $repeat; $i++) {
            $taskIdArray[] = DB::table('tasks')
                ->insertGetId([
                    'user_id' => $userId,
                    'project_id' => $projectId,
                    'name' => fake()->name(),
                    'slug' => fake()->unique()->slug(),
                    'type' => fake()->randomElement(['request', 'issue']),
                    'state' => fake()->randomElement(['new', 'processing', 'done', 'rejected']),
                    'created_at' => now(),
                    'updated_at' => now()
            ]);
        }

        return $taskIdArray;
    }
}
