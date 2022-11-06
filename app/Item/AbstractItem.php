<?php

namespace App\Item;

abstract class AbstractItem
{
    private int $id;

    abstract public function getId() : int;
    abstract public function save() : void;
}
