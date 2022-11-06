<?php

namespace App\Http\Controllers;

use App\Driver\Mysql\TaskItem;
use App\Project\Exception\NoSuchProjectException;
use App\Task\TaskItemPresenter;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use function App\Helpers\projectRepository;
use function App\Helpers\taskChangeRepository;
use function App\Helpers\taskRepository;

class TaskController extends Controller
{
    public function index(String $slug)
    {
        $task = taskRepository()->getTaskBySlug($slug);
        $taskChanges = taskChangeRepository()->getTaskChangesByTaskId($task->getId());
        return view("task.layout.index", [
            "task" => $task,
            "taskChanges" => $taskChanges
        ]);
    }

    public function overview()
    {
        $name = array_key_exists('name', request(['name']))
            ? request(['name'])['name'] ?? ''
            : '';
        $state = array_key_exists('state', request(['state']))
            ? strtolower(request(['state'])['state']) ?? ''
            : '';
        $type = array_key_exists('type', request(['type']))
            ? strtolower(request(['type'])['type']) ?? ''
            : '';

        $tasks = taskRepository()->getTasksByNameStateAndType($name, $state, $type);

        return view('task.layout.overview', [
            'tasks' => $tasks
        ]);
    }

    public function create() {
        $projects = projectRepository()->getAllProjects();
        $projectNames = $projects->map(function ($project) {
            return $project->getName();
        });
        return view("task.layout.create", [
            "projectNames" => $projectNames
        ]);
    }

    public function createWithDefault(string $slug) {
        $projects = projectRepository()->getAllProjects();
        $projectNames = $projects->map(function ($project) {
            return $project->getName();
        });
        return view("task.layout.create", [
            "defaultProject" => projectRepository()->getProjectBySlug($slug)->getName(),
            "projectNames" => $projectNames
        ]);
    }

    public function store() {
        $attributes = request()->validate([
            "project_name" => ["required", "min: 3", "max:255", Rule::exists("projects", "name")],
            "name" => ["required", "min:3", "max:255", Rule::unique("tasks", "name")],
            "type" => ["required", Rule::in(["Issue", "Request"])]
        ]);

        try {
            $project = projectRepository()->getProjectByName($attributes['project_name']);

            taskRepository()->store(auth()->user()->id, $project->getId(), $attributes['name'], $attributes['type'], 'new');
            return redirect("/tasks")->with("success", __("messages.createSuccess.task"));

        } catch(NoSuchProjectException) {
            return redirect("/tasks")->with("error", __("messages.error.noSuchProject"));
        }
    }

    public function edit(Request $request, string $slug) {
        /*if ($request->user()->cannot("update", $task)) {
            return redirect("/tasks")->with("error", __("messages.error.permission"));
        }*/

        return view("task.layout.edit", [
            "task" => taskRepository()->getTaskBySlug($slug)
        ]);
    }

    public function update(Request $request, string $slug) {
        /*if ($request->user()->cannot("update", $task)) {
            return redirect("/tasks")->with("error", __("messages.error.permission"));
        }*/

        $attributes = request()->validate([
            "name" => ["required", "min:3", "max:255", Rule::unique("tasks", "name")],
            "type" => ["required", Rule::in(["Issue", "Request"])],
            "state" => ["required", Rule::in(["New", "Processing", "Done", "Rejected"])]
        ]);
        $attributes['state'] = strtolower($attributes['state']);
        $task = taskRepository()->getTaskBySlug($slug);

        $task->setName($attributes['name']);;
        $task->setType($attributes['type']);
        $task->setState($attributes['state']);
        $task->save();

        taskChangeRepository()->store(auth()->user()->id, $task->getId(), $attributes['state'], '');

        return redirect("/tasks")->with("success", __("messages.editSuccess.task"));
    }

    public function remove(Request $request, string $slug) {
        /*if ($request->user()->cannot("delete", $task)) {
            return redirect("/tasks")->with("error", __("messages.error.permission"));
        }*/

        return view("task.layout.delete", [
            "task" => taskRepository()->getTaskBySlug($slug)
        ]);
    }

    public function delete(Request $request, string $slug) {
        /*if ($request->user()->cannot("delete", $task)) {
            return redirect("/tasks")->with("error", __("messages.error.permission"));
        }*/

        $task = taskRepository()->getTaskBySlug($slug);
        taskRepository()->delete($task->getId());
        return redirect("/tasks")->with("success", __("messages.removeSuccess.task"));
    }
}
