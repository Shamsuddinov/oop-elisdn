<?php

class Canvas
{
    public function paint($x, $y, $z)
    {
        return '[x = ' . $x . '; y = ' . $y . '; z = ' . $z . ']';
    }

    public function line($x1, $y1, $z1, $x2, $y2, $z2)
    {
        return '[x1 = ' . $x1 . '; y1 = ' . $y1 . '; z1 = ' . $z1 . ';' . 'x2 = ' . $x2 . '; y2 = ' . $y2 . '; z2 = ' . $z2 . ']';
    }
}

$canvas = new Canvas();

$x = $y = $z = 1;

echo $canvas->paint($x, $y, $z) . PHP_EOL;