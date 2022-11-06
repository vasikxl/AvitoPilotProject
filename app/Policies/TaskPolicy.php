<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;
use App\Task\TaskItemInterface;
use App\User\UserItemInterface;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;


    public function update(UserItemInterface $user, TaskItemInterface $task)
    {
        return $user->getId() === $task->getUserId();
    }

    public function delete(User $user, Task $task)
    {
        return $user->getId() === $task->getUserId();
    }
}
