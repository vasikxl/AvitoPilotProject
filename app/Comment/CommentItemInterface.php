<?php

namespace App\Comment;

interface CommentItemInterface
{
    public function getId() : int;
    public function getProjectId() : int;
    public function getUserId() : int;
    public function getUserName() : string;
    public function getFileName() : string;
    public function setFileName(string $fileName) : void;
    public function getFilePath() : string;
    public function setFilePath(string $filePath) : void;
    public function getComment() : string;
    public function setComment(string $comment) : void;
    public function getCreatedAt() : string;
    public function getUpdatedAt() : string;
}
