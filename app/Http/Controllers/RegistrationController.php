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
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use function App\Helpers\userRepository;

class RegistrationController extends Controller
{
    /**
     * Vraci view pro stranku registrace.
     *
     * @return Application|Factory|View
     */
    public function __invoke() {
        return view("registration.layout.registration");
    }

    /**
     * Uklada noveho uzivatele.
     *
     * @return Application|RedirectResponse|Redirector
     */
    public function store() {
        $attributes = request()->validate([
            "name" => ["required", "min: 3", "max:255", Rule::unique("users", "name")],
            "email" => ["required", "min:3", "max:255", "email", Rule::unique("users", "email")],
            "password" => ["required", "min:8", "max:255"]
        ]);

        userRepository()->store($attributes['name'], $attributes['email'], bcrypt($attributes['password']));

        return redirect("/")->with("success", __("messages.createSuccess.registration"));
    }
}
