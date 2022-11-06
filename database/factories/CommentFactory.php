<?php

namespace Database\Factories;

use Illuminate\Support\Facades\DB;

class CommentFactory
{
    public static function create(int $repeat, int $projectId, int $userId)
    {
        $commentIdArray = [];

        for ($i = 0; $i < $repeat; $i++)
        {
            $commentIdArray[] = DB::table('comments')
                ->insert([
                    'project_id' => $projectId,
                    'user_id' => $userId,
                    'file_name' => "",
                    'file_path' => "",
                    'comment' => fake()->text(),
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
        }

        return $commentIdArray;
    }
}
