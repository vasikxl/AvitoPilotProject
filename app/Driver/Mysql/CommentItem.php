<?php

namespace App\Driver\Mysql;

use App\Comment\CommentItemInterface;
use App\Item\AbstractItem;
use function App\Helpers\commentRepository;
use function App\Helpers\projectRepository;

class CommentItem extends AbstractItem implements CommentItemInterface
{
    private int $id;
    private int|null $projectId;
    private int|null $userId;
    private string|null $userName;
    private string|null $fileName;
    private string $filePath;
    private string|null $comment;
    private string|null $createdAt;
    private string|null $updatedAt;

    /**
     * Vraci novou instanci tridy CommentItem
     *
     * @param int $id
     * @param int|null $projectId
     * @param int|null $userId
     * @param string|null $userName
     * @param string|null $fileName
     * @param string $filePath
     * @param string|null $comment
     * @param string|null $createdAt
     * @param string|null $updatedAt
     */

    public function __construct(int $id, int|null $projectId, int|null $userId, string|null $userName,
                                string|null $fileName, string $filePath, string|null $comment, string|null $createdAt,
                                string|null $updatedAt)
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
