<?php

namespace App\ProjectCollection;

use Illuminate\Database\Eloquent\Collection;
use function App\Helpers\projectRepository;
use function App\Helpers\taskRepository;

class ProjectCollection extends Collection
{
    private Collection $projectsToTasks;

    public function __construct($projects)
    {
        parent::__construct($projects);
        $this->projectsToTasks = $this->calculateProjectsToTasks();
    }

    private function calculateProjectsToTasks() {
        $projectIds = $this->items->map(function ($item) {
            return $item->getId();
        });
        $tasks = taskRepository()->getTasksTypesAndStatesByProjectIds($projectIds);

        return $this->items->map(function($project) use($tasks) {
            $correspondingIssues = $tasks->filter(function($task) use($project) {
                return $task->getProjectId() == $project->getId() && $task->getType() == 'issue';
            });
            $correspondingRequests = $tasks->filter(function($task) use($project) {
                return $task->getProjectId() == $project->getId() && $task->getType() == 'request';
            });
            return [
                'projectId' => $project->getId(),
                'issue' => [
                    'new' => $correspondingIssues->filter(function($task) {
                        return $task->getState() == 'new';
                    })->count(),
                    'processing' => $correspondingIssues->filter(function($task) {
                        return $task->getState() == 'processing';
                    })->count(),
                    'done' => $correspondingIssues->filter(function($task) {
                        return $task->getState() == 'done';
                    })->count(),
                    'rejected' => $correspondingIssues->filter(function($task) {
                        return $task->getState() == 'rejected';
                    })->count()
                ],
                'request' => [
                    'new' => $correspondingRequests->filter(function($task) {
                        return $task->getState() == 'new';
                    })->count(),
                    'processing' => $correspondingRequests->filter(function($task) {
                        return $task->getState() == 'processing';
                    })->count(),
                    'done' => $correspondingRequests->filter(function($task) {
                        return $task->getState() == 'done';
                    })->count(),
                    'rejected' => $correspondingRequests->filter(function($task) {
                        return $task->getState() == 'rejected';
                    })->count()
                ]
            ];
        });
    }

    public function getProjectsToTasks() : Collection
    {
        return $this->projectsToTasks;
    }
}
