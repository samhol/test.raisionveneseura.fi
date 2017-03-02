<?php

namespace Sphp\Html;

use Sphp\Core\Http\HttpCodeCollection;
use Sphp\Stdlib\Path;

Document::setHtmlVersion(Document::HTML5);

$errorCode = filter_input(INPUT_SERVER, 'REDIRECT_STATUS', FILTER_SANITIZE_NUMBER_INT);
if ($errorCode === null) {
  $errorCode = filter_input(INPUT_GET, 'error_code', FILTER_SANITIZE_NUMBER_INT);
}

$html = Document::html();
if ($errorCode !== null) {
  $p = new HttpCodeCollection();
  if ($p->contains($errorCode)) {
    $title = $errorCode . ': ' . $p->getMessage($errorCode);
  }
  Document::html()->setDocumentTitle($title);
  $html->body()->addCssClass('error-page');
} else {
  $page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING);
  $titleGenerator = new \Sphp\MVC\TitleGenerator($mainLinks);
  $title = $titleGenerator->createTitleFor($page);
  Document::html()->setDocumentTitle($title);
}

use Sphp\Html\Head\Meta;

//$html->enableSPHP();
$html->head()
        ->useFontAwesome()
        ->useFoundationIcons()
        ->addCssSrc('sphp/css/base.css')
        ->addCssSrc('https://cdn.rawgit.com/konpa/devicon/master/devicon.min.css')
        ->addCssSrc('//cdn.jsdelivr.net/devicons/1.8.0/css/devicons.min.css')
        ->setBaseAddr(Path::get()->http(), '_self')
        ->addShortcutIcon(Path::get()->http('_srcs/img/logo.png'))
        ->addMeta(Meta::author('Sami Holck'))
        ->addMeta(Meta::keywords(['raisio', 'veneseura', 'veneily', 'laituripaikka']))
        ->addMeta(Meta::description('Raision veneseuran kotisivut'));

echo $html->getOpeningTag() . $html->head();
