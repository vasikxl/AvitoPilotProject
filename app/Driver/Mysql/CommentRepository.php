<?php

namespace App\Driver\Mysql;

use App\Comment\CommentItemInterface;
use App\Comment\CommentRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CommentRepository implements CommentRepositoryInterface {

    /**
     * Vraci pouze cestu k souboru komentare a jeho id.
     *
     * @param int $id
     * @return CommentItem
     */
    public function getOnlyCommentFilePath(int $id) : CommentItemInterface
    {
        $comment = DB::table('comment_file_path_view')
            ->select('file_path', 'id')
            ->where('id', $id)
            ->get()->first();

        return new CommentItem($comment->id, null, null, null,
            null, $comment->file_path, null, null, null);
    }

    /**
     * Vraci vsechny komentare k prislusnemu id projektu.
     *
     * @param int $projectId
     * @return Collection
     */
    public function getCommentsByProjectId(int $projectId) : Collection {
        $comments = DB::table('comments')
            ->where('project_id', '=', $projectId)
            ->select('comments.*', 'users.name AS userName')
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->get();

        return $comments->map(function($comment) {
            return new CommentItem($comment->id, $comment->project_id, $comment->user_id, $comment->userName,
                $comment->file_name, $comment->file_path, $comment->comment, $comment->created_at, $comment->updated_at);
        });
    }

    /**
     * Vytvori novy komentar.
     *
     * @param int $projectId
     * @param int $userId
     * @param string $fileName
     * @param string $filePath
     * @param string $comment
     * @return void
     */
    public function store(int $projectId, int $userId, string $fileName, string $filePath, string $comment): int
    {
        $attributes = [
            'project_id' => $projectId,
            'user_id' => $userId,
            'file_name' => $fileName,
            'file_path' => $filePath,
            'comment' => $comment,
            'created_at' => now(),
            'updated_at' => now()
        ];
        return DB::table('comments')
            ->insertGetId($attributes);
    }

    /**
     * Aktualizuje udaje o komentari dle id.
     *
     * @param int $commentId
     * @param string $fileName
     * @param string $filePath
     * @param string $comment
     * @return void
     */
    public function update(int $commentId, string $fileName, string $filePath, string $comment): void
    {
        DB::table('comments')
            ->where('id', $commentId)
            ->update([
                'file_name' => $fileName,
                'file_path' => $filePath,
                'comment' => $comment,
                'updated_at' => now()
            ]);
    }

    /**
     * Smaze komentar dle id.
     *
     * @param int $commentId
     * @return void
     */
    public function delete(int $commentId): void
    {
        DB::table('comments')
            ->where('id', $commentId)
            ->delete();
    }

    /**
     * Vraci komentar dle id.
     *
     * @param int $commentId
     * @return CommentItemInterface
     */
    public function getCommentById(int $commentId): CommentItemInterface
    {
        $comment = DB::table('comments')
            ->select('comments.*', 'users.name AS userName')
            ->where('comments.id', $commentId)
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->get()->first();

        return new CommentItem($comment->id, $comment->project_id, $comment->user_id, $comment->userName,
            $comment->file_name, $comment->file_path, $comment->comment, $comment->created_at, $comment->updated_at);
    }
}

