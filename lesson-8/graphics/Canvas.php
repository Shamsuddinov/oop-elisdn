<?php

namespace lesson8\graphics;

use Exception;

class Canvas
{
    /**
     * @throws Exception
     */
    public function paint(Point $point): string
    {
        list($x, $y, $z) = $point->getPointCoordinates();

        return '[x = ' . $x . '; y = ' . $y . '; z = ' . $z . ']';
    }

    public function line(Point $from, Point $to): string
    {
        list($x, $y, $z) = $from->getPointCoordinates();
        list($x2, $y2, $z2) = $from->getPointCoordinates();

        return '[x = ' . $x . '; y = ' . $y . '; z = ' . $z . '] - [' . 'x = ' . $x2 . '; y = ' . $y2 . '; z = ' . $z2 . ']';
    }
}