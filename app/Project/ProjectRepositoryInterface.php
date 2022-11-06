<?php

namespace App\Project;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface ProjectRepositoryInterface
{
    public function getAllProjectsPaginated() : LengthAwarePaginator;
    public function getAllProjects() : Collection;
    public function getAllProjectsByName(String $name) : LengthAwarePaginator;
    public function getProjectBySlug(String $slug) : ProjectItemInterface;
    public function getProjectByName(string $name) : ProjectItemInterface;
    public function store(String $name, String $description, int $userId) : void;
    public function update(int $projectId, String $name, String $description) : void;
    public function delete(int $projectId) : void;
}
