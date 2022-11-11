<?php

namespace App\Project\Collection;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class ProjectCollection extends LengthAwarePaginator
{
    private Collection $projectsToTasks;

    public function __construct($projects)
    {
        parent::__construct($projects);
        $this->projectsToTasks = $this->calculateProjectsToTasks();
    }

        public function getProjectsToTasks() : Collection
    {
        return $this->projectsToTasks;
    }
}
