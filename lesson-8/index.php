<?php
use lesson8\graphics\Canvas;
use lesson8\points\DecartPoint;
use lesson8\points\CilindricalPoint;
use lesson8\points\SphericalPoint;

$canvas = new Canvas();
$x = $y = $z = 1;

$point = new DecartPoint($x, $y, $z);
echo $canvas->paint($point) . PHP_EOL;

$spherical = new SphericalPoint($x, $y, $z);
echo $canvas->paint($spherical) . PHP_EOL;

$cilindrical = new CilindricalPoint($x, $y, $z);
echo $canvas->paint($cilindrical) . PHP_EOL;
