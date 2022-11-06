<?php

namespace App\Driver\Mysql;

use App\Item\AbstractItem;
use App\User\UserItemInterface;
use Illuminate\Notifications\Notifiable;
use function App\Helpers\userRepository;

class UserItem extends AbstractItem implements UserItemInterface
{
    private int $id;
    private String $slug;
    private String $name;
    private String $email;
    private String $password;
    private String $createdAt;
    private String $updatedAt;

    /**
     * Vraci novou instance tridy UserItem.
     *
     * @param int $id
     * @param String $slug
     * @param String $name
     * @param String $email
     * @param String $password
     * @param String $createdAt
     * @param String $updatedAt
     */
    public function __construct(int $id, string $slug, string $name, string $email, string $password, String $createdAt, String $updatedAt)
    {
        $this->id = $id;
        $this->slug = $slug;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->updatedAt = $updatedAt;
        $this->createdAt = $createdAt;
    }

    /**
     * Vraci id uzivatele.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Vraci slug uzivatele.
     *
     * @return String
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * Vraci jmeno uzivatele
     *
     * @return String
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Nastavuje nove jmeno uzivatele.
     *
     * @param String $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Vraci e-mail uzivatele.
     *
     * @return String
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Nastavuje novy e-mail uzivatele.
     *
     * @param String $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * Vraci heslo uzivatele.
     *
     * @return String
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Nastavuje nove heslo uzivatele.
     *
     * @param String $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * Vraci createdAt timestamp.
     *
     * @return String
     */
    public function getCreatedAt(): String
    {
        return $this->createdAt;
    }

    /**
     * Vraci updatedAt timestamp.
     *
     * @return String
     */
    public function getUpdatedAt(): String
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
        userRepository()->update($this->id, $this->name, $this->email, $this->password);
    }
}
