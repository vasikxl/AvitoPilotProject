<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Symfony\Component\Console\Input\Input;

class SessionsController extends Controller
{
    /**
     * Vraci view pro stranku prihlaseni.
     *
     * @return Application|Factory|View
     */
    public function create() {
        return view("sessions.layout.login");
    }

    /**
     * Uklada nove sezeni (prihlasuje).
     *
     * @return Application|RedirectResponse|Redirector
     */
    public function store() {
        $attributes = request()->validate([
            "email" => ["required", "email"],
            "password" => ["required"]
        ]);

        if (Auth::attempt($attributes)) {
            return redirect("/")->with("success", __("messages.createSuccess.login"));
        }

        return back()->withInput()->withErrors([
            "email" => __("messages.error.invalidCredentials")
        ]);
    }

    /**
     * Maze sezeni (odhlasuje).
     *
     * @return Application|RedirectResponse|Redirector
     */
    public function destroy() {
        Auth::logout();

        return redirect("/")->with("success", __("messages.removeSuccess.logout"));
    }
}
