<?php

declare(strict_types=1);

namespace App\Items;

class Conjured implements Tickeable
{
    public const OFFICIAL_NAME = 'Conjured Mana Cake';

    public function __construct(public int $quality, public int $sellIn)
    {
    }

    public function tick(): void
    {
        $this->sellIn--;
        $this->quality-=2;

        if ($this->itemHasOverPassedSellDate()) {
            $this->quality-=2;
        }

        if ($this->isQualityNegative()) {
            $this->quality = 0;
        }
    }

    public function itemHasOverPassedSellDate(): bool
    {
        return $this->sellIn < 0;
    }

    public function isQualityNegative(): bool
    {
        return $this->quality < 0;
    }
}