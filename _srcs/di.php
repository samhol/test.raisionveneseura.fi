<?php

$di = new \Zend\Di\Di();
$im = $di->instanceManager();
$im->setParameters(\Sphp\MVC\FileParser::class, [\SCANDIR_SORT_ASCENDING]);

$fileParser = $di->get(\Sphp\MVC\FileParser::class);
var_dump($fileParser('sivut/kilpailut/kalastus'));