<?php

namespace App\TaskChange;

use Illuminate\Support\Collection;

interface TaskChangeRepositoryInterface
{
    public function getTaskChangeById(int $id) : TaskChangeItemInterface;
    public function getTaskChangesByTaskId(int $taskId) : Collection;
    public function store(int $userId, int $taskId, string $newState, string $comment) : void;
    public function update(int $taskChangeId, string $newState, string $comment) : void;
    public function delete(int $taskChangeId) : void;
}
