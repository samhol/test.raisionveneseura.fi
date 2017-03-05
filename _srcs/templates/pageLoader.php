<?php

use Sphp\Html\Foundation\Sites\Containers\ExceptionCallout;
use Sphp\Html\Container;

$load = function($page) {
  try {
    ob_start();
    $examplePath = "sivut/" . $page . ".php";
    if (is_file($examplePath)) {
      (new Container)->appendMdFile($examplePath)->printHtml();
    } else {
      throw new \InvalidArgumentException("the path $examplePath contains no executable PHP script");
    }
    $content = ob_get_contents();
  } catch (\Exception $e) {
    $content .= new ExceptionCallout($e);
  }
  ob_end_clean();
  echo $content;
};
if (Sphp\Stdlib\Strings::startsWith($page, 'kilpailut.purjehdus')) {
  $seed = __DIR__ . '/../../' . str_replace('.', '/', $page) . '.php';
  echo $seed;
  if (is_file($seed)) {
    (new Sphp\Html\MdContainer())->appendFile($seed)->printHtml();
  } else {
    (new ExceptionCallout(new \Sphp\Html\HtmlException('Purjehduskilpailua ei löytynyt')))->printHtml();
  }
}

$load($page);
