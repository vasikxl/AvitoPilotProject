<?php

namespace App\User;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface UserRepositoryInterface
{
    public function getUserById(int $id) : UserItemInterface;
    public function getUserBySlug(String $slug) : UserItemInterface;
    public function getAllUsers() : LengthAwarePaginator;
    public function getAllUsersByName(String $name): LengthAwarePaginator;
    public function store(string $name, string $email, string $password) : void;
    public function update(int $userId, string $name, string $email, string $password) : void;
    public function delete(int $userId) : void;
}
