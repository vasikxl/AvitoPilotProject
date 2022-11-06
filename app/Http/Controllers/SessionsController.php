<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Symfony\Component\Console\Input\Input;

class SessionsController extends Controller
{
    public function create() {
        return view("sessions.layout.login");
    }

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

    public function destroy() {
        Auth::logout();

        return redirect("/")->with("success", __("messages.removeSuccess.logout"));
    }
}
