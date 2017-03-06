<?php
use Sphp\Stdlib\Path;
use Sphp\Stdlib\Parser;
use Sphp\MVC\LinkDataParser;
echo '<pre>';
$p = new LinkDataParser(Path::get()->local('linkit/mainLinks.yml'));
$mainLinks = Parser::fromFile(Path::get()->local('linkit/mainLinks.yml'));
print_r($mainLinks);
print_r($p);
echo '</pre>';
