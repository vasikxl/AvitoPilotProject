<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class TaskChangeFactory
{
    public static function create(int $repeat, int $userId, int $taskId)
    {
        $taskChangeIdArray = [];

        for ($i = 0; $i < $repeat; $i++) {
            $taskChangeIdArray[] = DB::table('task_changes')
                ->insertGetId([
                    'user_id' => $userId,
                    'task_id' => $taskId,
                    'new_state' => fake()->randomElement(["new", "processing", "done", "rejected"]),
                    'comment' => fake()->paragraph(),
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
        }

        return $taskChangeIdArray;
    }
}
