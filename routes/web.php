<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\NotifiedUsersController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\TaskChangeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware'=>'language'],function () {
    Route::get('/', function () {
        return view('homepage.view');
    })->name('home');

    Route::get("/set-language/{any}", function($any) {
        Session::put('locale',$any);

        return redirect("/");
    })->where("any", "cs|en");

    Route::get('/projects', [ProjectController::class, "overview"])->name('projects')->middleware("auth");
    Route::get('/users', [UserController::class, "overview"])->name('employees')->middleware("auth");
    Route::get('/tasks', [TaskController::class, "overview"])->name('tasks')->middleware("auth");

    Route::get("/user/{slug}/index", [UserController::class, "index"])->name("employee")->middleware("auth");

    Route::get("/project/{projectSlug}/index", [ProjectController::class, "index"])->name("Project")->middleware("auth");
    Route::get("/project/add/", [ProjectController::class, "create"])->name("Create project")->middleware("auth");
    Route::post("/project/add/", [ProjectController::class, "store"])->middleware("auth");
    Route::get("/project/{slug}/edit", [ProjectController::class, "edit"])->name("Edit project")->middleware("auth");
    Route::post("/project/{slug}/edit", [ProjectController::class, "update"])->middleware("auth");
    Route::get("/project/{slug}/remove", [ProjectController::class, "remove"])->name("Delete project")->middleware("auth");
    Route::post("/project/{slug}/remove", [ProjectController::class, "delete"])->middleware("auth");

    Route::get("/project/{slug}/comment", [CommentController::class, "comment"])->name("Comment Project")->middleware("auth");
    Route::post("/project/{slug}/comment", [CommentController::class, "store"])->middleware("auth");

    Route::get("/comment/download/{id}", [CommentController::class, "download"])->middleware("auth");

    Route::get("/notified-users/{slug}/create", [NotifiedUsersController::class, "create"])->name("Create Notification")->middleware("auth");
    Route::post("/notified-users/{slug}/create", [NotifiedUsersController::class, "store"])->middleware("auth");

    Route::get("/task/add/", [TaskController::class, "create"])->name("Create task")->middleware("auth");
    Route::get("/task/{slug}/add", [TaskController::class, "createWithDefault"])->name("Create task")->middleware("auth");
    Route::post("/task/add/", [TaskController::class, "store"])->middleware("auth");
    Route::get("/task/{slug}/index", [TaskController::class, "index"])->name("Task")->middleware("auth");
    Route::get("/task/{slug}/edit", [TaskController::class, "edit"])->name("Task edit")->middleware("auth");
    Route::post("/task/{slug}/edit", [TaskController::class, "update"])->middleware("auth");
    Route::get("/task/{slug}/remove", [TaskController::class, "remove"])->name("Remove task")->middleware("auth");
    Route::post("/task/{slug}/remove", [TaskController::class, "delete"])->middleware("auth");

    Route::get("/task-change/{slug}/create", [TaskChangeController::class, "create"])->name("Change state")->middleware("auth");
    Route::post("/task-change/create", [TaskChangeController::class, "store"])->middleware("auth");

    Route::get("/register", RegistrationController::class)->name("Sign up")->middleware("guest");
    Route::post("/register", [RegistrationController::class, "store"])->middleware("guest");

    Route::get("/login", [SessionsController::class, "create"])->name("Log In")->middleware("guest");
    Route::post("/login", [SessionsController::class, "store"])->middleware("guest");
    Route::post("/logout", [SessionsController::class, "destroy"])->middleware("auth");
});
