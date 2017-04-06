<?php

namespace Sphp\Html;

use Sphp\Http\HttpCodeCollection;
use Sphp\Stdlib\Path;
use Sphp\MVC\Router;
Document::setHtmlVersion(Document::HTML5);

$errorCode = filter_input(INPUT_SERVER, 'REDIRECT_STATUS', FILTER_SANITIZE_NUMBER_INT);
if ($errorCode === null) {
  $errorCode = filter_input(INPUT_GET, 'error_code', FILTER_SANITIZE_NUMBER_INT);
} if ($errorCode === null){
  
}
$title = 'foo';
$html = Document::html();

if ($errorCode !== null && $errorCode >= 400) {
  $p = new HttpCodeCollection();
  if ($p->contains($errorCode)) {
    $title = $errorCode . ': ' . $p->getMessage($errorCode);
  }
  Document::html()->setDocumentTitle($title);
  $html->body()->addCssClass('error-page');
} else {
  $page = Router::getCleanUrl();
  $titleGenerator = new \Sphp\MVC\TitleGenerator($mainLinks);
  $title = $titleGenerator->createTitleFor($page);
  Document::html()->setDocumentTitle($title);
}

use Sphp\Html\Head\Meta;
$html->setLanguage('fi');
$html->head()
        ->useFontAwesome()
        ->useFoundationIcons()
        ->addCssSrc('_srcs/css/base.css')
        ->addCssSrc('https://cdn.rawgit.com/konpa/devicon/master/devicon.min.css')
        ->addCssSrc('//cdn.jsdelivr.net/devicons/1.8.0/css/devicons.min.css')
        ->setBaseAddr(Path::get()->http(), '_self')
        ->addShortcutIcon(Path::get()->http('_srcs/img/logo.png'))
        ->addMeta(Meta::author('Sami Holck'))
        ->addMeta(Meta::keywords(['raisio', 'veneseura', 'veneily', 'laituripaikka']))
        ->addMeta(Meta::description('Raision veneseuran kotisivut'));

$html->startBody();
$html->enableSPHP();