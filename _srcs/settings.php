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