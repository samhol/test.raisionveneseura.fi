<?php
use Sphp\Stdlib\Path;
use Sphp\Stdlib\Parser;
echo '<pre>';
$mainLinks = Parser::fromFile(Path::get()->local('linkit/mainLinks.yml'));
print_r($mainLinks);
echo '</pre>';
