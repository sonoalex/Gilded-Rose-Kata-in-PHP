<?php

declare(strict_types=1);

namespace App\Items;

class BackstagePass implements Tickeable
{
    public const OFFICIAL_NAME = 'Backstage passes to a TAFKAL80ETC concert';
    private const MAX_QUALITY = 50;

    public function __construct(public int $quality, public int $sellIn)
    {
    }

    public function tick(): void
    {
        $this->sellIn--;

        if ($this->sellIn < 0) {
            $this->quality = 0;

            return;
        }

        $this->quality++;

        if ($this->sellIn < 10 && $this->sellIn >= 5) {
            $this->quality++;
        }

        if ($this->sellIn < 5 && $this->sellIn >= 0) {
            $this->quality+=2;
        }

        $this->ensureQualityIsntAboveOf();
    }

    private function ensureQualityIsntAboveOf()
    {
        if ($this->quality > self::MAX_QUALITY) {
            $this->quality = self::MAX_QUALITY;
        }
    }
}