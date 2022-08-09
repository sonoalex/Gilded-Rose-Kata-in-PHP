<?php

declare(strict_types=1);

namespace App;

use App\Items\AgedBrie;
use App\Items\BackstagePass;
use App\Items\Conjured;
use App\Items\Normal;
use App\Items\Sulfuras;

class ItemFactory
{
    public static function create(string $name, int $sellIn, int $quality)
    {
        $class =  match ($name){
            AgedBrie::OFFICIAL_NAME => AgedBrie::class,
            BackstagePass::OFFICIAL_NAME => BackstagePass::class,
            Normal::OFFICIAL_NAME => Normal::class,
            Conjured::OFFICIAL_NAME => Conjured::class,
            default => Sulfuras::class
        };

        return new $class($sellIn, $quality);
    }
}