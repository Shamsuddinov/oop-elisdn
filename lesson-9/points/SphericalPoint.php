<?php

namespace lesson9\points;

use lesson9\graphics\Point;

class SphericalPoint implements Point
{
    private $r;
    private $f;
    private $t;

    public function __construct($r, $f, $t)
    {
        $this->r = $r;
        $this->f = $f;
        $this->t = $t;
    }

    public function getPointCoordinates(): array
    {
        return [
            $this->r * cos($this->f) * sin($this->t),
            $this->r * sin($this->f) * cos($this->t),
            $this->r * cos($this->t)
        ];
    }
}