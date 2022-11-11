<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskChange;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\Rule;
use function App\Helpers\taskChangeRepository;
use function App\Helpers\taskRepository;

class TaskChangeController extends Controller
{
    /**
     * Vraci view pro vytvoreni nove zmeny ukolu.
     *
     * @param string $slug
     * @return Application|Factory|View
     */
    public function create(string $slug) {
        return view("task-change.layout.create", [
            "task" => taskRepository()->getTaskBySlug($slug)
        ]);
    }

    /**
     * Uklada novou zmenu ukolu.
     *
     * @return Application|RedirectResponse|Redirector
     */
    public function store() {
        $attributes = request()->validate([
            "new_state" => ["required", Rule::in(["New", "Processing", "Done", "Rejected"])],
            "comment" => ["max:255"],
            "task_name" => ["required", "min:3", "max:255", Rule::exists("tasks", "name")]
        ]);

        $task = taskRepository()->getTaskByName($attributes['task_name']);
        unset($attributes["task_name"]);
        $attributes['new_state'] = strtolower($attributes['new_state']);

        taskRepository()->update($task->getId(), $task->getName(), $task->getType(), $attributes['new_state']);
        taskChangeRepository()->store(auth()->user()->id, $task->getId(), $attributes['new_state'], $attributes['comment']);

        return redirect("/tasks")->with("success", __("messages.createSuccess.taskChange"));
    }
}
