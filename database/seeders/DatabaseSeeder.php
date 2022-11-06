<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\CommentFactory;
use Database\Factories\NotifiedUsersFactory;
use Database\Factories\ProjectFactory;
use Database\Factories\TaskChangeFactory;
use Database\Factories\TaskFactory;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $userIdCollection = UserFactory::create(10);

        foreach ($userIdCollection as $userId) {
            $projectIdCollection = ProjectFactory::create(5, $userId);

            foreach ($projectIdCollection as $projectId) {
                $taskIdCollection = TaskFactory::create(5, $userId, $projectId);

                foreach($taskIdCollection as $taskId) {
                    TaskChangeFactory::create(5, $userId, $taskId);
                }

                CommentFactory::create(5, $projectId, $userId);
                NotifiedUsersFactory::create(5, $userId, $projectId);
            }
        }
    }
}
