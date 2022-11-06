<?php

namespace App\Driver\Mysql;


use App\Item\AbstractItem;
use App\Project\ProjectItemInterface;
use function App\Helpers\projectRepository;

/**
 * Object pro projekty.
 */
class ProjectItem extends AbstractItem implements ProjectItemInterface {
    private int $id;
    private int $userId;
    private string $slug;
    private string $name;
    private string $description;
    private string $userName;
    private string $createdAt;
    private string $updatedAt;

    /**
     * Vrací novou instanci třídy ProjectItem.
     *
     * @param int $id
     * @param String $slug
     * @param String $name
     * @param String $description
     * @param String $userName
     * @param String $createdAt
     * @param String $updatedAt
     */
    function __construct(int $id, int $userId, String $slug, String $name, String $description, String $userName,
                         String $createdAt, String $updatedAt) {
        $this->id = $id;
        $this->userId = $userId;
        $this->slug = $slug;
        $this->name = $name;
        $this->description = $description;
        $this->userName = $userName;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    /**
     * Vrací ID projektu.
     *
     * @return int
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * Vraci ID uzivatele, ktery projekt vytvoril.
     *
     * @return int
     */
    public function getUserId() : int
    {
        return $this->userId;
    }

    /**
     * Vrací slug projektu.
     *
     * @return string
     */
    public function getSlug() : String
    {
        return $this->slug;
    }

    /**
     * Vrací jméno projektu.
     *
     * @return string
     */
    public function getName() : String
    {
        return $this->name;
    }

    /**
     * Nastavuje jméno projektu.
     *
     * @param String $name
     * @return void
     */
    public function setName(String $name) : void
    {
        $this->name = $name;
    }

    /**
     * Vrací popis projektu.
     *
     * @return string
     */
    public function getDescription() : String
    {
        return $this->description;
    }

    /**
     * Nastavuje popis projektu.
     *
     * @param String $description
     * @return void
     */
    public function setDescription(String $description) : void
    {
        $this->description = $description;
    }

    /**
     * Vrací jméno autora projektu.
     *
     * @return string
     */
    public function getUserName() : String
    {
        return $this->userName;
    }

    /**
     * Vrací createdAt timestamp.
     *
     * @return String
     */
    public function getCreatedAt() : String
    {
        return $this->createdAt;
    }

    /**
     * Vrací updatedAt timestamp.
     *
     * @return String
     */
    public function getUpdatedAt() : String
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
        projectRepository()->update($this->id, $this->name, $this->description);
    }
}
