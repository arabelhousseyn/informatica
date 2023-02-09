<?php

namespace App\Traits;

trait GenerateUsername
{
    public function generateUsername(string $slug)
    {
        return join('.', explode(' ', $slug));
    }
}
