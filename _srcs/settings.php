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
        ->setMessageLocale('fi_FI')
        ->setExceptionHandler($handler)
        ->init();
require_once('menuArrays.php');
require_once('constants.php');

session_start();

use Sphp\Stdlib\Parser;

$config = new Config(Parser::fromFile(__DIR__ . '/settings.yml'));

namespace Sphp\MVC;

require_once 'templates/loaders.php';

$router = new Router();
$router->route('/', $loadIndex);
$router->route('/hallitus.html', $loadBoardMembers, 11);
$router->route('/hallitus', $loadBoardMembers, 11);
$router->route('/jasenhakemus', $loadMembershipForm, 11);
$router->route('/jasenhakemus.html', $loadMembershipForm, 11);
$router->route('/jasenhakemus.php', $loadMembershipForm, 11);
$router->route('/kilpailut', $loadContents, 11);
$router->route('/tiedotteet', $loadBulletingBoard, 11);
$router->route('/tiedotteet.php', $loadBulletingBoard, 11);
$router->route('/tiedotteet.html', $loadBulletingBoard, 11);
$router->route('/dokumentit', $loadDocLists, 11);
$router->route('/kilpailut/kalastus/<!year>', $loadFishingCompetition);
$router->route('/kilpailut/purjehdus/<!year>', $loadSailingCompetition);
$router->route('/<!pagename>', $loadPage);
$router->route('/' . date('Y'), $seasonSchedule);
//$router->route('/kilpailut/<*categories>', $loadCompetition);
$router->setDefaultRoute($loadNotFound);
