<?php

declare(strict_types=1);

namespace App\Items;

class Sulfuras implements Tickeable
{
    private const MAX_QUALITY = 80;

    public function __construct(public int $quality, public int $sellIn)
    {
    }

    public function tick(): void
    {
    }
}