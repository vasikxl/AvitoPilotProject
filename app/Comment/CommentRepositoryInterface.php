<?php

namespace App\Comment;

use Illuminate\Support\Collection;

interface CommentRepositoryInterface
{
    public function getCommentsByProjectId(int $projectId) : Collection;
    public function getCommentById(int $commentId) : CommentItemInterface;
    public function store(int $projectId, int $userId, string $fileName, string $filePath, string $comment) : int;
    public function update(int $commentId, string $fileName, string $filePath, string $comment) : void;
    public function delete(int $commentId) : void;
}
