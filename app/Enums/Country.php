<?php
namespace App\Enums;

use ReflectionClass;

class Country
{
    const UKRAINE = 'Ukraine';
    const USA = 'United States of America';
    const GERMANY = 'Germany';
    const POLAND = 'Poland';

    public static function rand():string
    {
        $refl = new ReflectionClass(static::class);
        $constants = $refl->getConstants();
        return $constants[array_rand($constants)];
    }
}
