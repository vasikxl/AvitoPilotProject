<?php

namespace App\Driver\Mysql;

use App\Item\AbstractItem;
use App\Task\TaskItemInterface;
use App\Task\TaskItemPresenter;
use App\Task\TaskItemPresenterInterface;
use function App\Helpers\taskRepository;

/**
 * Object pro úkoly.
 */
class TaskItem extends AbstractItem implements TaskItemInterface
{
    private int $id;
    private string $slug;
    private string $name;
    private string $projectName;
    private int $projectId;
    private string $userName;
    private string $state;
    private string $type;
    private string $createdAt;
    private string $updatedAt;
    private string $taskPresenter = TaskItemPresenter::class;

    /**
     * Vrací novou instanci třídy TaskItem.
     *
     * @param int $id
     * @param string $slug
     * @param string $name
     * @param int $projectId
     * @param string $projectName
     * @param string $userName
     * @param string $state
     * @param string $type
     * @param string $createdAt
     * @param string $updatedAt
     */

    public function __construct(int $id, string $slug, string $name, int $projectId, string $projectName, string $userName, string $state, string $type, string $createdAt, string $updatedAt)
    {
        $this->id = $id;
        $this->slug = $slug;
        $this->name = $name;
        $this->projectId = $projectId;
        $this->projectName = $projectName;
        $this->userName = $userName;
        $this->state = $state;
        $this->type = $type;
        $this->createdAt= $createdAt;
        $this->updatedAt = $updatedAt;
    }

    /**
     * Vrací ID úkolu.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Vrací slug úkolu.
     *
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * Vrací název úkolu.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Nastavuje název úkolu.
     *
     * @param String $name
     * @return void
     */
    public function setName(String $name): void
    {
        $this->name = $name;
    }

    /**
     * Vrací název projektu, ke kterému úkol patří.
     *
     * @return string
     */
    public function getProjectName(): string
    {
        return $this->projectName;
    }

    /**
     * Nastavuje název projektu, ke kterému úkol patří.
     *
     * @param String $projectName
     * @return void
     */
    public function setProjectName(String $projectName): void
    {
        $this->projectName = $projectName;
    }

    /**
     * Vraci id projektu, ke kteremu ukol patri.
     *
     * @return int
     */
    public function getProjectId(): int
    {
        return $this->projectId;
    }

    /**
     * Nastavuje id projektu, ke kteremu ukol patri.
     *
     * @param int $projectId
     */
    public function setProjectId(int $projectId): void
    {
        $this->projectId = $projectId;
    }

    /**
     * Vrací stav úkolu.
     *
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * Nastavuje stav úkolu.
     *
     * @param string $state
     */
    public function setState(string $state): void
    {
        $this->state = $state;
    }

    /**
     * Vrací typ úkolu.
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Nastavuje typ úkolu.
     *
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * Vrací jméno autora úkolu.
     *
     * @return string
     */
    public function getUserName(): string
    {
        return $this->userName;
    }

    /**
     * Nastavuje jméno autora úkolu.
     *
     * @param String $userName
     * @return void
     */
    public function setUserName(String $userName): void
    {
        $this->userName = $userName;
    }

    /**
     * Vrací createdAt timestamp.
     *
     * @return string
     */
    public function getCreatedAt(): string {
        return $this->createdAt;
    }

    /**
     * Vrací updatedAt timestamp.
     *
     * @return string
     */
    public function getUpdatedAt(): string
    {
        return $this->updatedAt;
    }

    /**
     * Ulozi aktualni zaznam do tabulky.
     *
     * @return void
     */
    public function save(): void
    {
        taskRepository()->update($this->id, $this->name, $this->type, $this->state);
    }

    /**
     * Vraci
     *
     * @return string
     */
    public function getTaskStateBadge(): string
    {
        return $this->taskPresenter::getTaskStateBadge($this->state);
    }

    /**
     * @return string
     */
    public function getTaskTypeBadge(): string
    {
        return $this->taskPresenter::getTaskTypeBadge($this->type);
    }

    /**
     * @return string
     */
    public function getTaskStateIcon(): string
    {
        return $this->taskPresenter::getTaskStateIcon($this->state);
    }

    /**
     * @return string
     */
    public function getTaskTypeIcon(): string
    {
        return $this->taskPresenter::getTaskTypeIcon($this->type);
    }

    public function getTaskFinishedAt(): string
    {
        return $this->taskPresenter::getTaskFinishedAt($this->state, $this->updatedAt);
    }
}
