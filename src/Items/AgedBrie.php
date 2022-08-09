<?php

declare(strict_types=1);

namespace App\Items;

class AgedBrie implements Tickeable
{
    public const OFFICIAL_NAME = 'Aged Brie';
    private const MAX_QUALITY = 50;

    public function __construct(public int $quality, public int $sellIn)
    {
    }

    public function tick(): void
    {
        $this->quality++;
        $this->sellIn--;

        // Twice as fast if sellIn is reached
        if ($this->itemHasReachedSellDate()) {
            $this->quality++;
        }

        $this->ensureQualityIsntAboveOf();
    }

    public function itemHasReachedSellDate(): bool
    {
        return $this->sellIn <= 0;
    }

    private function ensureQualityIsntAboveOf()
    {
        if ($this->quality > self::MAX_QUALITY) {
            $this->quality = self::MAX_QUALITY;
        }
    }
}