<?php

namespace Sphp\Stdlib;

use Sphp\MVC\LinkDataParser;

$mainLinks = (new LinkDataParser(Path::get()->local('linkit/mainLinks.yml')))->toArray();
//$mainLinks = Parser::fromFile(Path::get()->local('linkit/mainLinks.yml'));
$topbarLinks = Parser::fromFile(Path::get()->local('linkit/top_bar_links.yml'));

