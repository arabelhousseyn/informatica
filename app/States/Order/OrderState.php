<?php

namespace App\States\Order;

use Spatie\ModelStates\State;
use Spatie\ModelStates\StateConfig;

abstract class OrderState extends State
{
    public static function config(): StateConfig
    {
        return parent::config()
            ->default(Pending::class)
            ->allowTransition(Pending::class, Approved::class)
            ->allowTransition(Approved::class, Shipment::class)
            ->allowTransition(Approved::class, Canceled::class)
            ->allowTransition(Shipment::class, Delivered::class)
            ->allowTransition(Shipment::class, Canceled::class);
    }
}
