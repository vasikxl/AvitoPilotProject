<?php

namespace App\Driver\Mysql;

use App\TaskChange\TaskChangeItemInterface;
use App\TaskChange\TaskChangeRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

/**
 * Driver pro praci s databazi zmen ukolu.
 *
 * Zdroje:
 *  - Třída používá databází projektů a uživatelů
 *
 * Optimalizace:
 *  - Třída využívá cachování
 */
class TaskChangeRepository implements TaskChangeRepositoryInterface
{

    /**
     * Vraci zmenu ukolu dle id.
     *
     * @param int $id
     * @return TaskChangeItemInterface
     */
    public function getTaskChangeById(int $id): TaskChangeItemInterface
    {
        $taskChange = DB::table('task_changes')
            ->select('task_changes.*', 'users.name AS userName')
            ->where('task_changes.id', '=', $id)
            ->join('users', 'task_changes.user_id', '=', 'users.id')
            ->get();

        return new TaskChangeItem($taskChange->id, $taskChange->task_id, $taskChange->user_id, $taskChange->userName,
            $taskChange->new_state, $taskChange->comment, $taskChange->created_at, $taskChange->updated_at);
    }

    /**
     * Vraci zmenu ukolu dle id ukolu.
     *
     * @param int $taskId
     * @return Collection
     */
    public function getTaskChangesByTaskId(int $taskId): Collection
    {
        $taskChanges = DB::table('task_changes')
            ->select('task_changes.*', 'users.name AS userName')
            ->where('task_changes.task_id', '=', $taskId)
            ->join('users', 'task_changes.user_id', '=', 'users.id')
            ->get();

        return $taskChanges->map(function ($taskChange) {
            return new TaskChangeItem($taskChange->id, $taskChange->task_id, $taskChange->user_id, $taskChange->userName,
                $taskChange->new_state, $taskChange->comment ?? '', $taskChange->created_at, $taskChange->updated_at);
        });
    }

    /**
     * Vytvori novou zmenu ukolu.
     *
     * @param int $userId
     * @param int $taskId
     * @param string $newState
     * @param string $comment
     * @return void
     */
    public function store(int $userId, int $taskId, string $newState, string $comment) : void {
        $attributes = [
            'user_id' => $userId,
            'task_id' => $taskId,
            'new_state' => $newState,
            'comment' => $comment,
            'created_at' => now(),
            'updated_at' => now()
        ];
        DB::table('task_changes')
            ->insert($attributes);
    }

    /**
     * Zmeni udaje o zmene ukolu.
     *
     * @param int $taskChangeId
     * @param string $newState
     * @param string $comment
     * @return void
     */
    public function update(int $taskChangeId, string $newState, string $comment) : void {
        DB::table('task_changes')
            ->where('id', $taskChangeId)
            ->update([
                'new_state' => $newState,
                'comment' => $comment,
                'updated_at' => now()
            ]);
    }

    /**
     * Smaze zmenu ukolu dle id.
     *
     * @param int $taskChangeId
     * @return void
     */
    public function delete(int $taskChangeId) : void {
        DB::table('task_changes')
            ->where('id', $taskChangeId)
            ->delete();
    }
}
