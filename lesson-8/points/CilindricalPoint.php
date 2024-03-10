<?php

namespace lesson8\points;

use lesson8\graphics\Point;

class CilindricalPoint implements Point
{
    private $f;
    private $r;
    private $h;

    public function __construct($f, $r, $h)
    {
        $this->f = $f;
        $this->r = $r;
        $this->h = $h;
    }

    public function getPointCoordinates(): array
    {
        return [
            $this->r * cos($this->f),
            $this->r * sin($this->f),
            $this->h
        ];
    }
}