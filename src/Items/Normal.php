<?php

declare(strict_types=1);

namespace App\Items;

class Normal implements Tickeable
{
    public const OFFICIAL_NAME = 'normal';

    public function __construct(public int $quality, public int $sellIn)
    {
    }

    public function tick(): void
    {
        $this->quality--;
        $this->sellIn--;

        // Twice as fast if sellIn is reached
        if ($this->itemHasOverPassedSellDate()) {
            $this->quality--;
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
