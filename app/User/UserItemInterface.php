<?php

namespace App\User;

use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Notification;

interface UserItemInterface
{
    public function getId() : int;
    public function getSlug() : String;
    public function getName() : String;
    public function setName(String $name) : void;
    public function getPassword() : String;
    public function setPassword(String $password) : void;
    public function getEmail() : String;
    public function setEmail(String $email) : void;
    public function getCreatedAt() : String;
    public function getUpdatedAt() : String;
}
