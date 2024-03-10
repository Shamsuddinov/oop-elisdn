<?php

namespace graphics {

    use Exception;

    interface Point
    {
        public function getPointCoordinates();
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
}

namespace points {

    use graphics\Point;

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

        public function getPointCoordinates()
        {
            return [
                $this->r * cos($this->f) * sin($this->t),
                $this->r * sin($this->f) * cos($this->t),
                $this->r * cos($this->t)
            ];
        }
    }

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

        public function getPointCoordinates()
        {
            return [
                $this->r * cos($this->f),
                $this->r * sin($this->f),
                $this->h
            ];
        }
    }
}

namespace {

    use graphics\Canvas;
    use points\CilindricalPoint;
    use points\DecartPoint;
    use points\SphericalPoint;

    $canvas = new Canvas();
    $x = $y = $z = 1;

    $point = new DecartPoint($x, $y, $z);
    echo $canvas->paint($point) . PHP_EOL;

    $cilindrical = new CilindricalPoint($x, $y, $z);
    echo $canvas->paint($cilindrical) . PHP_EOL;

    $spherical = new SphericalPoint($x, $y, $z);
    echo $canvas->paint($spherical) . PHP_EOL;
}
?>