<?php

interface Point
{
    public function getPointCoordinates();
}

class DecartPoint implements Point
{
    public $x;
    public $y;
    public $z;

    public function getPointCoordinates()
    {
        return [
            $this->x,
            $this->y,
            $this->z
        ];
    }
}

class CilindricalPoint implements Point
{
    public $f;
    public $r;
    public $h;

    public function getPointCoordinates()
    {
        return [
            $this->r * cos($this->f),
            $this->r * sin($this->f),
            $this->h
        ];
    }
}

class SphericalPoint implements Point
{
    public $r;
    public $f;
    public $t;

    public function getPointCoordinates()
    {
        return [
            $this->r * cos($this->f) * sin($this->t),
            $this->r * sin($this->f) * cos($this->t),
            $this->r * cos($this->t)
        ];
    }
}

class Canvas
{
    /**
     * @throws Exception
     */
    public function paint(Point $point)
    {
        list($x, $y, $z) = $point->getPointCoordinates();

        return '[x = ' . $x . '; y = ' . $y . '; z = ' . $z . ']';
    }

    public function line(Point $from, Point $to)
    {
        list($x, $y, $z) = $from->getPointCoordinates();
        list($x2, $y2, $z2) = $from->getPointCoordinates();

        return '[x = ' . $x . '; y = ' . $y . '; z = ' . $z . '] - [' . 'x = ' . $x2 . '; y = ' . $y2 . '; z = ' . $z2 . ']';
    }
}

$canvas = new Canvas();
$x = $y = $z = 1;

$point = new DecartPoint();
$point->x = $x;
$point->y = $y;
$point->z = $z;

echo $canvas->paint($point) . PHP_EOL;

$cilindrical = new CilindricalPoint();
$cilindrical->f = $x;
$cilindrical->r = $y;
$cilindrical->h = $z;

echo $canvas->paint($cilindrical) . PHP_EOL;

$spherical = new SphericalPoint();
$spherical->f = $x;
$spherical->r = $y;
$spherical->t = $z;

echo $canvas->paint($spherical) . PHP_EOL;