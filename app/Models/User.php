<?php

namespace App\Models;

class User
{
    public function fullName()
    {
        return "{$this->first_name} {$this->last_name}";
    }
}