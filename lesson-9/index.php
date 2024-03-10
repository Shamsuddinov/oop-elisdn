<?php

use lesson9\graphics\Canvas;
use lesson9\points\DecartPoint;
use lesson9\points\CilindricalPoint;
use lesson9\points\SphericalPoint;

function autoLoad($class)
{
    require_once dirname(__DIR__) . '/' . str_replace('\\', '/', $class) . '.php';
}

// Buni nega yozilganligini ko'rish uchun, php lesson-8/index.php ni yurgizib ko'rish kerak
spl_autoload_register('autoLoad');

$canvas = new Canvas();
$x = $y = $z = 1;

$point = new DecartPoint($x, $y, $z);
echo $canvas->paint($point) . PHP_EOL;

$spherical = new SphericalPoint($x, $y, $z);
echo $canvas->paint($spherical) . PHP_EOL;

$cilindrical = new CilindricalPoint($x, $y, $z);
echo $canvas->paint($cilindrical) . PHP_EOL;
