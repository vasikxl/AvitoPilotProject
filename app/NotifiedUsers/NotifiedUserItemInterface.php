<?php

namespace App\NotifiedUsers;

interface NotifiedUserItemInterface
{
    public function getProjectId() : int;
    public function getUserId() : int;
    public function getProjectName() : string;
    public function getUserName() : string;
    public function getUserEmail() : string;
    public function getCreatedAt() : string;
    public function getUpdatedAt() : string;
    public function notifyViaEmail(mixed $instance) : void;
}
