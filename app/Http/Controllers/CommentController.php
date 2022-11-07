<?php

namespace App\Http\Controllers;

use App\Jobs\UploadFile;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;
use function App\Helpers\commentRepository;
use function App\Helpers\projectRepository;

class CommentController extends Controller
{
    /**
     * Vraci view pro vytvoreni noveho komentare.
     *
     * @param string $slug
     * @return Application|Factory|View
     */
    public function comment(string $slug) {
        $project = projectRepository()->getProjectBySlug($slug);

        return view("comment.layout.create", [
            "name" => $project->getName(),
            "slug" => $project->getSlug()
        ]);
    }

    /**
     * Uklada komentar i jeho prilohu.
     *
     * @param string $slug
     * @return Application|RedirectResponse|Redirector
     */
    public function store(string $slug) {
        $project = projectRepository()->getProjectBySlug($slug);

        $attributes = request()->validate([
            "comment" => ["required", "max:2048"],
            "file_name" => []
        ]);

        $newCommentId = commentRepository()->store($project->getId(), auth()->user()->id, '', '', $attributes['comment']);

        if(isset($attributes["file_name"])) {
            UploadFile::dispatch(Request::file("file_name")->getContent(),
                Request::file("file_name")->getClientOriginalName(),
                Request::file("file_name")->extension(),
                commentRepository()->getCommentById($newCommentId));
        }

        return redirect("/projects")->with("success", __("messages.createSuccess.comment"));
    }

    /**
     * Dohledava a stahuje prilohu.
     *
     * @param int $commentId
     * @return StreamedResponse
     */
    public function download(int $commentId) {
        $comment = commentRepository()->getCommentById($commentId);
        return Storage::download("public/comment_attachments/{$comment->getFilePath()}");
    }
}
