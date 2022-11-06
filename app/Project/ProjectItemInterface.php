<?php

namespace App\Project;

interface ProjectItemInterface
{
    public function getId() : int;
    public function getUserId() : int;
    public function getSlug() : String;
    public function getName() : String;
    public function setName(String $name) : void;
    public function getDescription() : String;
    public function setDescription(String $description) : void;
    public function getUserName() : String;
    public function getCreatedAt() : String;
    public function getUpdatedAt() : String;
}

