<?php

namespace App\Driver\Mysql;

use App\NotifiedUsers\NotifiedUserItemInterface;
use App\NotifiedUsers\NotifiedUserRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class NotifiedUserRepository implements NotifiedUserRepositoryInterface
{

    /**
     * Vraci vsechny notifikace dle id projektu.
     *
     * @param int $projectId
     * @return Collection
     */
    public function getAllNotifiedUsersByProjectId(int $projectId): Collection
    {
        $notifiedUsers = DB::table('notified_users')
            ->select('notified_users.*', 'users.name AS userName', 'users.email AS userEmail', 'projects.name AS projectName')
            ->where('notified_users.project_id' , '=', $projectId)
            ->join('users', 'users.id' , '=', 'notified_users.user_id')
            ->join('projects', 'projects.id', '=', 'notified_users.project_id')
            ->get();

        return $notifiedUsers->map(function($notifiedUser) {
            return new NotifiedUserItem($notifiedUser->project_id, $notifiedUser->user_id, $notifiedUser->userName,
                $notifiedUser->userEmail, $notifiedUser->projectName, $notifiedUser->created_at, $notifiedUser->updated_at);
        });
    }

    /**
     * Vraci vsechny notifikace dle id projektu a id uzivatele.
     *
     * @param int $projectId
     * @param int $userId
     * @return Collection
     */
    public function getAllNotifiedUsersByProjectIdAndUserId(int $projectId, int $userId) : Collection {
        $notifiedUsers = DB::table('notified_users')
            ->select('notified_users.*', 'users.name AS userName', 'users.email AS userEmail', 'projects.name AS projectName')
            ->where('notified_users.project_id' , '=', $projectId)
            ->where('notified_users.user_id', '=', $userId)
            ->join('users', 'users.id' , '=', 'notified_users.user_id')
            ->join('projects', 'projects.id', '=', 'notified_users.project_id')
            ->get();

        return $notifiedUsers->map(function($notifiedUser) {
            return new NotifiedUserItem($notifiedUser->project_id, $notifiedUser->user_id, $notifiedUser->userName,
                $notifiedUser->userEmail, $notifiedUser->projectName, $notifiedUser->created_at, $notifiedUser->updated_at);
        });
    }

    /**
     * Vytvori novou notifikaci.
     *
     * @param int $projectId
     * @param int $userId
     * @return void
     */
    public function store(int $projectId, int $userId): void
    {
        $attributes = [
            'project_id' => $projectId,
            'user_id' => $userId,
            'created_at' => now(),
            'updated_at' => now()
        ];
        DB::table('notified_users')
            ->insert($attributes);
    }

    /**
     * Smaze notifikaci.
     *
     * @param int $projectId
     * @param int $userId
     * @return void
     */
    public function delete(int $projectId, int $userId): void
    {
        DB::table('notified_users')
            ->where('project_id', '=', $projectId)
            ->where('user_id', '=', $userId)
            ->delete();
    }
}
