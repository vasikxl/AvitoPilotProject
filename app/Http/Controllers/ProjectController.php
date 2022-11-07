<?php

namespace App\Http\Controllers;

use App\Driver\Mysql\UserItem;
use App\Models\Project;
use App\Models\User;
use App\Notifications\ProjectChange;
use App\Project\ProjectItemInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\Rule;
use function App\Helpers\commentRepository;
use function App\Helpers\notifiedUsersRepository;
use function App\Helpers\projectRepository;
use function App\Helpers\taskRepository;

class ProjectController extends Controller
{
    protected function projectsToTasks($projects, $tasks) {
        return $projects->map(function($project) use($tasks) {
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
        })->collect();
    }

    /**
     * Vraci view pro jednu stranku vsech projektu.
     *
     * @return Application|Factory|View
     */
    public function overview()
    {
        $projects = array_key_exists('search', request(['search'])) ?
            projectRepository()->getAllProjectsByName(request(['search'])['search']) :
            projectRepository()->getAllProjectsPaginated();
        $projectIds = $projects->map(function ($item) {
            return $item->getId();
        });

        $tasks = taskRepository()->getTasksTypesAndStatesByProjectIds($projectIds);

        return view('project.layout.overview', [
            'rows' => $projects,
            'projectsToTasks' => $this->projectsToTasks($projects, $tasks),
        ]);
    }

    /**
     * Vraci view pro jednotlivy projekt.
     *
     * @param ProjectItemInterface $project
     * @return Application|Factory|View
     */
    public function index(ProjectItemInterface $project)
    {
        $tasks = taskRepository()->getTasksByProjectId($project->getId());
        $comments = commentRepository()->getCommentsByProjectId($project->getId());

        return view('project.layout.index', [
            'project' => $project,
            'comments' => $comments,
            'tasks' => $tasks,
        ]);
    }

    /**
     * Vraci view pro vytvoreni projektu.
     *
     * @return Application|Factory|View
     */
    public function create() {
        return view('project.layout.create');
    }

    /**
     * Vytvari projekt.
     *
     * @return Application|RedirectResponse|Redirector
     */
    public function store() {
        $attributes = request()->validate([
            'name' => ['required', 'min: 3', 'max:255', Rule::unique('projects', 'name')],
            'description' => ['required', 'min:3', 'max:255']
        ]);
        $attributes['user_id'] = auth()->user()->id;

        projectRepository()->store($attributes['name'], $attributes['description'], $attributes['user_id']);
        return redirect('/projects')->with('success', __('messages.createSuccess.project'));
    }

    /**
     * Vraci view pro upravu projektu.
     *
     * @param Request $request
     * @param string $slug
     * @return Application|Factory|View
     */
    public function edit(Request $request, string $slug) {
        $project = projectRepository()->getProjectBySlug($slug);
        /*if ($this->authorize('update', auth()->user()->id, $project->getUserId())) {
            return redirect('/projects')->with('error', __('messages.error.permission'));
        }*/
        return view('project.layout.edit', [
            'project' => $project
        ]);
    }

    /**
     * Edituje projekt.
     *
     * @param Request $request
     * @param string $slug
     * @return Application|RedirectResponse|Redirector
     */
    public function update(Request $request, string $slug) {
        /*if ($request->user()->cannot('update', $project)) {
            return redirect('/projects')->with('error', __('messages.error.permission'));
        }*/

        $attributes = request()->validate([
            'name' => ['required', 'min: 3', 'max:255', Rule::unique('projects', 'name')],
            'description' => ['required', 'min:3', 'max:255']
        ]);
        $project = projectRepository()->getProjectBySlug($slug);

        $project->setName($attributes['name']);
        $project->setDescription($attributes['description']);
        $project->save();

        $allToBeNotified = notifiedUsersRepository()->getAllNotifiedUsersByProjectId($project->getId());

        $notification = new ProjectChange($project, 'update');
        foreach($allToBeNotified as $toBeNotified) {
            $toBeNotified->notifyViaEmail($notification);
        }

        return redirect('/projects')->with('success', __('messages.editSuccess.project'));
    }

    /**
     * Vraci view pro mazani projektu.
     *
     * @param Request $request
     * @param string $slug
     * @return Application|Factory|View
     */
    public function remove(Request $request, string $slug) {
        /*if ($request->user()->cannot('delete', $project)) {
            return redirect('/projects')->with('error', __('messages.error.permission'));
        }*/

        return view('project.layout.delete', [
            'project' => projectRepository()->getProjectBySlug($slug)
        ]);
    }

    /**
     * Maze projekt.
     *
     * @param Request $request
     * @param string $slug
     * @return Application|RedirectResponse|Redirector
     */
    public function delete(Request $request, string $slug) {
        /*if ($request->user()->cannot('delete', $project)) {
            return redirect('/projects')->with('error', __('messages.error.permission'));
        }*/
        $project = projectRepository()->getProjectBySlug($slug);
        projectRepository()->delete($project->getId());

        return redirect('/projects')->with('success', __('messages.removeSuccess.project'));
    }
}
