<?php

namespace App\Driver\Mysql;

use App\NotifiedUsers\NotifiableUserTrait;
use App\NotifiedUsers\NotifiedUserItemInterface;

class NotifiedUserItem implements NotifiedUserItemInterface
{
    use NotifiableUserTrait;

    private int $projectId;
    private int $userId;
    private string $userName;
    private string $email;
    private string $projectName;
    private string $createdAt;
    private string $updatedAt;

    /**
     * Vraci novou instanci tridy NotifiedUsersItem
     *
     * @param int $projectId
     * @param int $userId
     * @param string $userName
     * @param string $userEmail
     * @param string $projectName
     * @param string $createdAt
     * @param string $updatedAt
     */
    public function __construct(int $projectId, int $userId, string $userName, string $userEmail, string $projectName, string $createdAt, string $updatedAt)
    {
        $this->projectId = $projectId;
        $this->userId = $userId;
        $this->userName = $userName;
        $this->email = $userEmail;
        $this->projectName = $projectName;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    /**
     * Vraci id projektu, u ktereho je nastavena notifikace.
     *
     * @return int
     */
    public function getProjectId(): int
    {
        return $this->projectId;
    }

    /**
     * Vraci id uzivatele, ktery notifikaci nastavil.
     *
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * Vraci jmeno uzivatele, ktery notifikaci nastavil.
     *
     * @return string
     */
    public function getUserName(): string
    {
        return $this->userName;
    }

    /**
     * Vraci email uzivatele, ktery notifikaci nastavil.
     *
     * @return string
     */
    public function getUserEmail(): string
    {
        return $this->email;
    }

    /**
     * Vraci nazev projektu, ke kteremu je notifikace nastavena.
     *
     * @return string
     */
    public function getProjectName(): string
    {
        return $this->projectName;
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
     * Posle notifikaci emailem.
     *
     * @param mixed $instance
     * @return void
     */
    public function notifyViaEmail(mixed $instance): void
    {
        $this->notifyUser($instance);
    }
}
