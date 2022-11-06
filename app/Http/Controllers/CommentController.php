<?php

namespace App\Http\Controllers;

use App\Jobs\UploadFile;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use function App\Helpers\commentRepository;
use function App\Helpers\projectRepository;

class CommentController extends Controller
{
    public function comment(string $slug) {
        $project = projectRepository()->getProjectBySlug($slug);

        return view("comment.layout.create", [
            "name" => $project->getName(),
            "slug" => $project->getSlug()
        ]);
    }

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

    public function download(int $commentId) {
        $comment = commentRepository()->getCommentById($commentId);
        return Storage::download("public/comment_attachments/{$comment->getFilePath()}");
    }
}
