<?php

namespace App\Jobs;

use App\Comment\CommentItemInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;

class UploadFile implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private string $fileContents;
    private string $fileName;
    private CommentItemInterface $commentItem;
    private string $fileExtension;

    /**
     * Vytvori novou instanci jobu.
     *
     * @return void
     */
    public function __construct(string $fileContents, string $fileName, string $fileExtension, CommentItemInterface $commentItem)
    {
        $this->fileContents = $fileContents;
        $this->fileName = $fileName;
        $this->commentItem = $commentItem;
        $this->fileExtension = $fileExtension;
    }

    /**
     * Provede job.
     *
     * @return void
     */
    public function handle()
    {
        $hash = hash("sha256", $this->fileName);
        $fileHash = "$hash.$this->fileExtension";
        Storage::put("public/comment_attachments/$fileHash", $this->fileContents);

        $this->commentItem->setFileName($this->fileName);
        $this->commentItem->setFilePath($fileHash);
        $this->commentItem->save();
    }
}
