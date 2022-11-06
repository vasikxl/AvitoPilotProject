<?php

namespace App\Task;

interface TaskItemInterface
{
    public function getId() : int;
    public function getSlug() : string;
    public function getName() : string;
    public function setName(string $name) : void;
    public function getProjectName() : string;
    public function setProjectName(string $projectName) : void;
    public function getProjectId() : int;
    public function setProjectId(int $projectId) : void;
    public function getState() : string;
    public function setState(string $state) : void;
    public function getType() : string;
    public function getUserName() : string;
    public function setUserName(string $userName) : void;
    public function setType(string $type) : void;
    public function getCreatedAt() : string;
    public function getUpdatedAt() : string;
    public function getTaskStateBadge() : string;
    public function getTaskTypeBadge() : string;
    public function getTaskStateIcon() : string;
    public function getTaskTypeIcon() : string;
    public function getTaskFinishedAt() : string;
};
