<?php

namespace App\Enums;

use ReflectionClass;

class OrderStatus {
    public const InProcess = "In Process";
    public const Paid = "Paid";
    public const Completed = "Completed";
    public const Canceled = "Canceled";

    public function findByKey(string $key)
    {
        return constant("self::$key");
    }

    public static function cases(): array {
        $refl = new ReflectionClass( static::class );

        return $refl->getConstants();
    }
}
