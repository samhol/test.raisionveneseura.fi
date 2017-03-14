<?php

namespace Sphp\Config;

require_once(__DIR__ . '/../sphp/settings.php');

use Sphp\Config\ErrorHandling\ExceptionHandler;
use Sphp\Config\ErrorHandling\ExceptionLogger;
use Sphp\Config\ErrorHandling\ExceptionPrinter;

$handler = new ExceptionHandler();
// Attach an Exception Logger
$handler->attach(new ExceptionLogger(__DIR__ . '/logs/exception_log.log'));
$handler->attach((new ExceptionPrinter())->showTrace());

(new PHPConfig())
        ->setErrorReporting(E_ALL)
        ->setDefaultTimezone('Europe/Helsinki')
        ->setEncoding('UTF-8')
        ->setExceptionHandler($handler)
        ->init();
require_once ('menuArrays.php');
require_once('constants.php');

session_start();

use Sphp\Stdlib\Parser;
$config = new Config(Parser::fromFile(__DIR__ . '/settings.yml'));

namespace Sphp\MVC;
require_once '_srcs/templates/loaders.php';

$router = new Router();
$router->route('/', $loadIndex);
$router->route('/<:pagename>', $loadPage);
$router->route('/' . date('Y'), $seasonSchedule);
$router->route('/kilpailut/kalastus/<#year>', $loadFishingCompetition);
$router->route('/kilpailut/purjehdus/<#year>', $loadSailingCompetition);
//$router->route('/kilpailut/<*categories>', $loadCompetition);
$router->setDefaultRoute($loadNotFound);
