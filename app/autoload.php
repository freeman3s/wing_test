<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use Composer\Autoload\ClassLoader;

$loader = require __DIR__.'/../vendor/autoload.php';
$loader->add('Gregwar', __DIR__.'/../vendor/bundles');

AnnotationRegistry::registerLoader(array($loader, 'loadClass'));

return $loader;
