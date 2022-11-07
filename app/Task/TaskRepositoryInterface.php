<?php

namespace App\Task;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface TaskRepositoryInterface
{
    public function getTaskBySlug(string $slug) : TaskItemInterface;
    public function getTasksByProjectId(int $projectId) : Collection;
    public function getTasksTypesAndStatesByProjectIds(Collection $projectIds) : Collection;
    public function getTasksByNameStateAndType(String $name, String $state, String $type) : LengthAwarePaginator;
    public function getTaskByName(string $name) : TaskItemInterface;
    public function getTaskById(int $taskId) : TaskItemInterface;
    public function store(int $userId, int $projectId, string $name, string $type, string $state) : void;
    public function update(int $taskId, string $name, string $type, string $state) : void;
    public function delete(int $taskId) : void;
}
