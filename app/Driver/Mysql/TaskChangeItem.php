<?php

namespace App\Driver\Mysql;

use App\Item\AbstractItem;
use App\TaskChange\TaskChangeItemInterface;
use function App\Helpers\taskChangeRepository;

class TaskChangeItem extends AbstractItem implements TaskChangeItemInterface
{
    private int $id;
    private int $taskId;
    private string $userName;
    private int $userId;
    private string $newState;
    private string $comment;
    private string $createdAt;
    private string $updatedAt;

    /**
     * @param int $id
     * @param int $taskId
     * @param int $userId
     * @param string $userName
     * @param string $newState
     * @param string $comment
     * @param string $createdAt
     * @param string $updatedAt
     */
    public function __construct(int $id, int $taskId, int $userId, string $userName, string $newState,
                                string $comment, string $createdAt, string $updatedAt)
    {
        $this->id = $id;
        $this->taskId = $taskId;
        $this->userId = $userId;
        $this->userName = $userName;
        $this->newState = $newState;
        $this->comment = $comment;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    /**
     * Vraci id zmeny ukolu.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Vraci id ukolu, ke kteremu zmena ukolu patri.
     *
     * @return int
     */
    public function getTaskId(): int
    {
        return $this->taskId;
    }

    /**
     * Vraci id uzivatele, ktery zmenu ukolu vytvoril.
     *
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * Vraci novy stav v zmene ukolu.
     *
     * @return string
     */
    public function getNewState(): string
    {
        return $this->newState;
    }

    /**
     * Vraci popis zmeny ukolu.
     *
     * @return string
     */
    public function getComment(): string
    {
        return $this->comment;
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
     * Nastavuje novy stav zmeny ukolu.
     *
     * @param string $newState
     */
    public function setNewState(string $newState): void
    {
        $this->newState = $newState;
    }

    /**
     * Nastavuje popis zmeny ukolu.
     *
     * @param string $comment
     */
    public function setComment(string $comment): void
    {
        $this->comment = $comment;
    }

    /**
     * Vraci jmeno uzivatele, ktery vytvoril zmenu.
     *
     * @return string
     */
    public function getUserName(): string
    {
        return $this->userName;
    }

    /**
     * Uloz zaznam do tabulky.
     *
     * @return void
     */
    public function save(): void
    {
        taskChangeRepository()->update($this->id, $this->newState, $this->comment);
    }
}
