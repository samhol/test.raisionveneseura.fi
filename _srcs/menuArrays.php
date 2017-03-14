<?php

namespace Sphp\Stdlib;


$mainLinks = Parser::fromFile(Path::get()->local('linkit/mainLinks.yml'));
//$mainLinks = Parser::fromFile(Path::get()->local('linkit/mainLinks.yml'));
$topbarLinks = Parser::fromFile(Path::get()->local('linkit/top_bar_links.yml'));

