<?php

namespace App\Project;

use Illuminate\Support\Collection;

interface ProjectItemInterface
{
    public function getId() : int;
    public function getUserId() : int;
    public function getSlug() : string;
    public function getName() : string;
    public function setName(string $name) : void;
    public function getDescription() : string;
    public function setDescription(string $description) : void;
    public function getUserName() : string;
    public function setUserName(string $userName) : void;
    public function getCreatedAt() : string;
    public function getUpdatedAt() : string;
    public function calculateProjectsToTasks() : Collection;
}

