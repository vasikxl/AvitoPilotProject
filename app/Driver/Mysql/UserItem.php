<?php

namespace App\Driver\Mysql;

use App\Item\AbstractItem;
use App\User\UserItemInterface;
use Illuminate\Notifications\Notifiable;
use function App\Helpers\userRepository;

class UserItem extends AbstractItem implements UserItemInterface
{
    private int $id;
    private string $slug;
    private string $name;
    private string $email;
    private string $password;
    private string $createdAt;
    private string $updatedAt;

    /**
     * Vraci novou instance tridy UserItem.
     *
     * @param int $id
     * @param string $slug
     * @param string $name
     * @param string $email
     * @param string $password
     * @param string $createdAt
     * @param string $updatedAt
     */
    public function __construct(int $id, string $slug, string $name, string $email, string $password,
                                string $createdAt, string $updatedAt)
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
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * Vraci jmeno uzivatele
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Nastavuje nove jmeno uzivatele.
     *
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Vraci e-mail uzivatele.
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Nastavuje novy e-mail uzivatele.
     *
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * Vraci heslo uzivatele.
     *
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Nastavuje nove heslo uzivatele.
     *
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
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
     * Ulozi aktualni zaznam do tabulky.
     *
     * @return void
     */
    public function save(): void
    {
        userRepository()->update($this->id, $this->name, $this->email, $this->password);
    }
}
