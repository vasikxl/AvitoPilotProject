<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;
use function App\Helpers\userRepository;

class UserController extends Controller
{
    public function overview()
    {
        $users = is_null(request('name')) ?
            userRepository()->getAllUsers()
            : userRepository()->getAllUsersByName(request('name'));

        return view("user.layout.overview", [
            "rows" => $users
        ]);
    }

    public function index(String $slug)
    {
        return view("user.layout.index", [
            "user" => userRepository()->getUserBySlug($slug)
        ]);
    }
}
