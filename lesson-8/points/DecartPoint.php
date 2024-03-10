<?php

namespace lesson8\points;

use lesson8\graphics\Point;

class DecartPoint implements Point
{
    private $x;
    private $y;
    private $z;

    public function __construct($x, $y, $z)
    {
        $this->x = $x;
        $this->y = $y;
        $this->z = $z;
    }

    public function getPointCoordinates(): array
    {
        return [
            $this->x,
            $this->y,
            $this->z
        ];
    }
}