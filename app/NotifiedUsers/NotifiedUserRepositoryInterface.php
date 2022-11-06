<?php

namespace App\NotifiedUsers;

use Illuminate\Support\Collection;

interface NotifiedUserRepositoryInterface
{
    public function getAllNotifiedUsersByProjectId(int $projectId) : Collection;
    public function getAllNotifiedUsersByProjectIdAndUserId(int $projectId, int $userId) : Collection;
    public function store(int $projectId, int $userId) : void;
    public function delete(int $projectId, int $userId) : void;
}
