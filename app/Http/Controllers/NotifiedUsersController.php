<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use function App\Helpers\notifiedUsersRepository;
use function App\Helpers\projectRepository;

class NotifiedUsersController extends Controller
{
    /**
     * Vraci view pro vytvoreni notifikace.
     *
     * @param string $slug
     * @return Application|Factory|View
     */
    public function create(string $slug) {
        return view("notified-users.layout.create", [
            "project" => projectRepository()->getProjectBySlug($slug)
        ]);
    }

    /**
     * Vytvari novou notifikace.
     *
     * @param string $slug
     * @return Application|RedirectResponse|Redirector
     */
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
