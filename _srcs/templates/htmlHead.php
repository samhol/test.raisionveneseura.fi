<?php

namespace Sphp\Html;

use Sphp\Stdlib\Path;
use Sphp\MVC\Router;
use Sphp\MVC\TitleGenerator;

Document::setHtmlVersion(Document::HTML5);

$html = Document::html();
$titleGenerator = new TitleGenerator($mainLinks);
$title = $titleGenerator->createTitleFor(Router::getCleanUrl());
Document::html()->setDocumentTitle($title);

use Sphp\Html\Head\Meta;

Document::html()->setLanguage('fi')
      ->head()
        ->useFontAwesome()
        //->useFoundationIcons()
        ->addCssSrc('https://cdnjs.cloudflare.com/ajax/libs/motion-ui/1.1.1/motion-ui.min.css')
        ->addCssSrc('_srcs/css/base.css')
        ->addCssSrc('https://cdn.rawgit.com/konpa/devicon/master/devicon.min.css')
        ->addCssSrc('//cdn.jsdelivr.net/devicons/1.8.0/css/devicons.min.css')
        ->setBaseAddr(Path::get()->http(), '_self')
        ->addShortcutIcon(Path::get()->http('_srcs/img/logo.png'))
        ->addMeta(Meta::author('Sami Holck'))
        ->addMeta(Meta::keywords(['raisio', 'veneseura', 'veneily', 'laituripaikka']))
        ->addMeta(Meta::description('Raision veneseuran kotisivut'));

Document::html()->startBody();
Document::html()->enableSPHP();
