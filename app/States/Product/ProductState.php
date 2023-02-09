<?php

namespace App\States\Product;

use Spatie\ModelStates\State;
use Spatie\ModelStates\StateConfig;

abstract class ProductState extends State
{
    public static function config(): StateConfig
    {
        return parent::config()
            ->default(Draft::class)
            ->allowTransition(Draft::class, Published::class)
            ->allowTransition(Published::class, Hidden::class)
            ->allowTransition(Hidden::class,Published::class);
    }
}
