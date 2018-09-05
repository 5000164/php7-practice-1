<?php

namespace App\Domain;

class User
{
    public $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}
