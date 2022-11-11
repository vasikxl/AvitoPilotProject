<?php

namespace App\Driver\Mysql;

use App\Task\TaskItemInterface;
use App\Task\TaskRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

/**
 * Driver pro praci s databazi ukolu.
 *
 * Zdroje:
 *  - Trida pouziva databazi uzivatelu a projektu
 *
 * Optimalizace:
 *  - Trida vyuziva cachovani
 */
class TaskRepository implements TaskRepositoryInterface
{
    /**
     * Vrati vsechny ukoly dle id projektu.
     *
     * @param int $projectId
     * @return Collection[TaskItem]
     */
    public function getTasksByProjectId(int $projectId) : Collection
    {
        $tasks = DB::table('tasks')
            ->where('project_id', '=', $projectId)
            ->select('tasks.id', 'tasks.name', 'tasks.type', 'tasks.state', 'tasks.created_at', 'tasks.updated_at',
                'tasks.slug', 'users.name AS userName', 'tasks.created_at', 'tasks.updated_at', 'projects.id AS projectId',
                'projects.name AS projectName')
            ->join('users', 'tasks.user_id', '=', 'users.id')
            ->join('projects', 'tasks.project_id', '=', 'projects.id')
            ->get();

        $tasks->transform(function ($task) {
            return new TaskItem($task->id, $task->slug, $task->name, $task->projectId, $task->projectName,
                $task->userName, $task->state, $task->type, $task->created_at, $task->updated_at);
        });

        return $tasks;
    }

    /**
     * Vrati vsechny ukoly k daným projektum dle id.
     *
     * @param Collection $projectIds
     * @return Collection[TaskItem]
     */
    public function GetTasksByProjectIds(Collection $projectIds) : Collection {
        $tasks = DB::table('tasks')
            ->whereIn('project_id', $projectIds)
            ->select('tasks.id', 'tasks.name', 'tasks.type', 'tasks.state', 'tasks.created_at', 'tasks.updated_at',
                'tasks.slug', 'users.name AS userName', 'projects.name AS projectName', 'projects.id AS projectId')
            ->join('users', 'tasks.user_id', '=', 'users.id')
            ->join('projects', 'tasks.project_id', '=', 'projects.id')
            ->get();

        return $tasks->map(function($task) {
            return new TaskItem($task->id, $task->slug, $task->name, $task->projectId, $task->projectName,
                $task->userName, $task->state, $task->type, $task->created_at, $task->updated_at);
        });
    }

    /**
     * Vrati ukoly dle nazvu, typu a stavu.
     *
     * @param String $name
     * @param String $state
     * @param String $type
     * @return LengthAwarePaginator[TaskItem]
     */
    public function getTasksByNameStateAndType(String $name, String $state, String $type) : LengthAwarePaginator {
        $tasks = DB::table('tasks')
            ->select('tasks.*', 'users.name as userName', 'projects.name as projectName', 'projects.id AS projectId')
            ->where('state', 'like', "%$state%")
            ->where('type', 'like', "%$type%")
            ->join('users', 'tasks.user_id', '=', 'users.id')
            ->join('projects', 'tasks.project_id', '=', 'projects.id')
            ->where('tasks.name', 'like', "%$name%")
            ->orWhere('users.name', 'like', "%$name%")
            ->orWhere('projects.name', 'like', "%$name%")
            ->paginate();

        $tasks->getCollection()->transform(function ($task) {
            return new TaskItem($task->id, $task->slug, $task->name, $task->projectId, $task->projectName,
                $task->userName, $task->state, $task->type, $task->created_at, $task->updated_at);
        });

        return $tasks;
    }

    /**
     * Vytvori novy ukol dle parametru.
     *
     * @param int $userId
     * @param int $projectId
     * @param string $name
     * @param string $type
     * @param string $state
     * @return void
     */
    public function store(int $userId, int $projectId, string $name, string $type, string $state): void
    {
        $attributes = [
            'user_id' => $userId,
            'project_id' => $projectId,
            'name' => $name,
            'type' => $type,
            'state' => $state,
            'created_at' => now(),
            'updated_at' => now()
        ];
        $attributes['slug'] = Str::slug($attributes['name']);
        DB::table('tasks')
            ->insert($attributes);
    }

    /**
     * Aktualizuje udaje o ukolu.
     *
     * @param int $taskId
     * @param string $name
     * @param string $type
     * @param string $state
     * @return void
     */
    public function update(int $taskId, string $name, string $type, string $state): void
    {
        DB::table('tasks')
        ->where('id', $taskId)
        ->update([
            'name' => $name,
            'type' => $type,
            'state' => $state,
            'updated_at' => now()
        ]);
    }

    /**
     * Snaze ukol dle id.
     *
     * @param int $taskId
     * @return void
     */
    public function delete(int $taskId): void
    {
        DB::table('tasks')
            ->where('id', $taskId)
            ->delete();
    }

    /**
     * @param string $slug
     * @return TaskItemInterface
     */
    public function getTaskBySlug(string $slug): TaskItemInterface
    {
        $task = DB::table('tasks')
            ->select('tasks.*', 'users.name AS userName', 'projects.name AS projectName', 'projects.id AS projectId')
            ->where('tasks.slug', '=', $slug)
            ->join('users', 'tasks.user_id', '=', 'users.id')
            ->join('projects', 'tasks.project_id', '=', 'projects.id')
            ->get()->first();

        return new TaskItem($task->id, $task->slug, $task->name, $task->projectId, $task->projectName, $task->userName,
            $task->state, $task->type, $task->created_at, $task->updated_at);
    }

    /**
     * Vraci ukol dle jeho jmena.
     *
     * @param string $name
     * @return TaskItemInterface
     */
    public function getTaskByName(string $name): TaskItemInterface
    {
        $task = DB::table('tasks')
            ->select('tasks.*', 'users.name AS userName', 'projects.name AS projectName', 'projects.id AS projectId')
            ->where('tasks.name', '=', $name)
            ->join('users', 'tasks.user_id', '=', 'users.id')
            ->join('projects', 'tasks.project_id', '=', 'projects.id')
            ->get()->first();

        return new TaskItem($task->id, $task->slug, $task->name, $task->projectId, $task->projectName, $task->userName,
            $task->state, $task->type, $task->created_at, $task->updated_at);
    }

    /**
     * Vraci ukol dle jeho id.
     *
     * @param int $taskId
     * @return TaskItemInterface
     */
    public function getTaskById(int $taskId): TaskItemInterface
    {
        $task = DB::table('tasks')
            ->select('tasks.*', 'users.name AS userName', 'projects.name AS projectName', 'projects.id AS projectId')
            ->where('tasks.id', '=', $taskId)
            ->join('users', 'tasks.user_id', '=', 'users.id')
            ->join('projects', 'tasks.project_id', '=', 'projects.id')
            ->get()->first();

        return new TaskItem($task->id, $task->slug, $task->name, $task->projectId, $task->projectName, $task->userName,
            $task->state, $task->type, $task->created_at, $task->updated_at);
    }
}
