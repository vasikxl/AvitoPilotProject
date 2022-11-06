<?php

namespace App\Driver\Mysql;

use App\Comment\CommentItemInterface;
use App\Item\AbstractItem;
use function App\Helpers\commentRepository;
use function App\Helpers\projectRepository;

class CommentItem extends AbstractItem implements CommentItemInterface
{
    private int $id;
    private int $projectId;
    private int $userId;
    private string $userName;
    private string $fileName;
    private string $filePath;
    private string $comment;
    private string $createdAt;
    private string $updatedAt;

    /**
     * Vraci novou instanci tridy CommentItem
     *
     * @param int $id
     * @param int $projectId
     * @param int $userId
     * @param string $userName
     * @param string $fileName
     * @param string $filePath
     * @param string $comment
     */

    public function __construct(int $id, int $projectId, int $userId, string $userName,
                                string $fileName, string $filePath, string $comment, string $createdAt, string $updatedAt)
    {
        $this->id = $id;
        $this->projectId = $projectId;
        $this->userId = $userId;
        $this->userName = $userName;
        $this->fileName = $fileName;
        $this->filePath = $filePath;
        $this->comment = $comment;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    /**
     * Vraci id komentare.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Vraci id projektu, ke kteremu komentar patri.
     *
     * @return int
     */
    public function getProjectId(): int
    {
        return $this->projectId;
    }

    /**
     * Vraci id uzivatele, ke kteremu komentar patri.
     *
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * Vraci nazev autora, ke kteremu komentar patri.
     *
     * @return string
     */
    public function getUserName(): string
    {
        return $this->userName;
    }

    /**
     * Vraci nazev souboru u komentare.
     *
     * @return string
     */
    public function getFileName(): string
    {
        return $this->fileName;
    }

    /**
     * Nastavuje nazev souboru u komentare,
     *
     * @param string $fileName
     */
    public function setFileName(string $fileName): void
    {
        $this->fileName = $fileName;
    }

    /**
     * Vraci cestu k souboru u komentare.
     *
     * @return string
     */
    public function getFilePath(): string
    {
        return $this->filePath;
    }

    /**
     * Nastavuje cestu k souboru u komentare.
     *
     * @param string $filePath
     */
    public function setFilePath(string $filePath): void
    {
        $this->filePath = $filePath;
    }

    /**
     * Vraci text komentare u komentare.
     *
     * @return string
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * Nastavuje text komentare u komentare.
     *
     * @param string $comment
     */
    public function setComment(string $comment): void
    {
        $this->comment = $comment;
    }

    /**
     * Vraci createdAt timestamp.
     *
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    /**
     * Vraci updatedAt timestamp.
     *
     * @return string
     */
    public function getUpdatedAt(): string
    {
        return $this->updatedAt;
    }

    /**
     * Zmeni aktualni zaznam v tabulce.
     *
     * @return void
     */
    public function save(): void
    {
        commentRepository()->update($this->id, $this->fileName, $this->filePath, $this->comment);
    }
}
