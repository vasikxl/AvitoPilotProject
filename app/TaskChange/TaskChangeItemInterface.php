<?php

namespace App\TaskChange;

interface TaskChangeItemInterface
{
    public function getId() : int;
    public function getTaskId() : int;
    public function getUserName() : string;
    public function getUserId() : int;
    public function getComment() : string;
    public function getNewState() : string;
    public function setComment(string $comment) : void;
    public function setNewState(string $newState) : void;
    public function getCreatedAt() : string;
    public function getUpdatedAt() : string;
}
