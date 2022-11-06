<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class NotifiedUsersFactory
{
    public static function create(int $repeat, int $userId, int $projectId)
    {
        for ($i = 0; $i < $repeat; $i++) {
            DB::table('notified_users')
                ->insert([
                    'user_id' => $userId,
                    'project_id' => $projectId,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
        }
    }
}
