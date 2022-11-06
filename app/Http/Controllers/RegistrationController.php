<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use function App\Helpers\userRepository;

class RegistrationController extends Controller
{
    public function __invoke() {
        return view("registration.layout.registration");
    }

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
