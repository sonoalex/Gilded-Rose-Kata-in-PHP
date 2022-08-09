<?php

namespace App\Items;

interface Tickeable
{
    public function tick(): void;
}