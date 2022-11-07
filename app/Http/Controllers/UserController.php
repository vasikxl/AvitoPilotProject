<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use function App\Helpers\userRepository;

class UserController extends Controller
{
    /**
     * Vraci view pro vypsani jedne stranky uzivatelu.
     *
     * @return Application|Factory|View
     */
    public function overview()
    {
        $users = is_null(request('name')) ?
            userRepository()->getAllUsers()
            : userRepository()->getAllUsersByName(request('name'));

        return view("user.layout.overview", [
            "rows" => $users
        ]);
    }

    /**
     * Vraci view pro vypsani jednoho uzivatele.
     *
     * @param String $slug
     * @return Application|Factory|View
     */
    public function index(String $slug)
    {
        return view("user.layout.index", [
            "user" => userRepository()->getUserBySlug($slug)
        ]);
    }
}
