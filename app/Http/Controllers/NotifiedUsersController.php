<?php

namespace App\Http\Controllers;

use function App\Helpers\notifiedUsersRepository;
use function App\Helpers\projectRepository;

class NotifiedUsersController extends Controller
{
    public function create(string $slug) {
        return view("notified-users.layout.create", [
            "project" => projectRepository()->getProjectBySlug($slug)
        ]);
    }

    public function store(string $slug) {
        $userId = auth()->user()->id;
        $project = projectRepository()->getProjectBySlug($slug);
        $notifiedUsers = notifiedUsersRepository()->getAllNotifiedUsersByProjectIdAndUserId($project->getId(), $userId);

        if ($notifiedUsers->count() > 0) {
            return redirect("/projects")->with("error", __("messages.error.notification"));
        }
        notifiedUsersRepository()->store($project->getId(), $userId);

        return redirect("/projects")->with("success", __("messages.createSuccess.notification"));
    }
}
