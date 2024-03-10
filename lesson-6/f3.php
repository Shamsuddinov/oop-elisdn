<?php

abstract class Point
{
}

class DecartPoint extends Point
{
    public $x;
    public $y;
    public $z;
}

class CilindricalPoint extends Point
{
    public $f;
    public $r;
    public $h;
}

class SphericalPoint extends Point
{
    public $r;
    public $f;
    public $t;
}

class Canvas
{
    /**
     * @throws Exception
     */
    public function paint(Point $point)
    {
        if ($point instanceof DecartPoint){
            $x = $point->x;
            $y = $point->y;
            $z = $point->z;
        } elseif ($point instanceof CilindricalPoint){
            $x = $point->r;
            $y = $point->h;
            $z = $point->f;
        } elseif ($point instanceof SphericalPoint){
            $x = $point->r;
            $y = $point->f;
            $z = $point->t;
        } else {
            throw new Exception('Unsupported coordinate system');
        }

        return '[x = ' . $x . '; y = ' . $y . '; z = ' . $z . ']';
    }

    public function line(Point $from, Point $to)
    {
        if ($from instanceof DecartPoint){
            $x = $from->x;
            $y = $from->y;
            $z = $from->z;
        } elseif ($from instanceof CilindricalPoint){
            $x = $from->r * cos($from->f);
            $y = $from->r * sin($from->f);
            $z = $from->h;
        } elseif ($from instanceof SphericalPoint){
            $x = $from->r * cos($from->f) * sin($from->t);
            $y = $from->r * sin($from->f) * cos($from->t);
            $z = $from->r * cos($from->t);
        } else {
            throw new Exception('Unsupported coordinate system');
        }

        if ($to instanceof DecartPoint){
            $x2 = $to->x;
            $y2 = $to->y;
            $z2 = $to->z;
        } elseif ($to instanceof CilindricalPoint){
            $x2 = $to->r * cos($to->f);
            $y2 = $to->r * sin($to->f);
            $z2 = $to->h;
        } elseif ($to instanceof SphericalPoint){
            $x2 = $to->r * cos($to->f) * sin($to->t);
            $y2 = $to->r * sin($to->f) * cos($to->t);
            $z2 = $to->r * cos($to->t);
        } else {
            throw new Exception('Unsupported coordinate system');
        }

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