<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskChange;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use function App\Helpers\taskChangeRepository;
use function App\Helpers\taskRepository;

class TaskChangeController extends Controller
{
    public function create(Task $task) {
        return view("task-change.layout.create", [
            "task" => $task
        ]);
    }

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
