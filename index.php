<?php
require_once('_srcs/settings.php');

use Symfony\Component\Yaml\Yaml;
use Sphp\Stdlib\Path;

$links = Yaml::parse(file_get_contents('linkit/mainLinks.yml'));
$top_bar_links = Yaml::parse(file_get_contents('linkit/top_bar_links.yml'));
$page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING);
if ($page === null) {
  $page = 'index';
} else {

  $page = str_replace(['.', '/'], '', $page);
}
?>
<!doctype html>
<html class="no-js" lang="fi">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raision veneseura</title>
    <link rel="stylesheet" href="sphp/css/base.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/motion-ui/1.1.1/motion-ui.min.css" />
  </head>
  <body>
    <div class="off-canvas-wrapper wrapper">
      <!-- off-canvas left menu -->
      <div class="off-canvas position-left" id="offCanvasLeft" data-off-canvas>
        <button class="close-button" aria-label="Close menu" type="button" data-close>
          <span aria-hidden="true">&times;</span>
        </button>
        <?php

        use Sphp\Html\Foundation\Sites\Navigation\MenuBuilder;
        use Sphp\Html\Foundation\Sites\Navigation\DrilldownMenu;

$menuBuilder = new MenuBuilder();
        echo $menuBuilder->buildMenu($links['menu'], new DrilldownMenu())->addCssClass('vertical')
        ?>
      </div>


      <!-- original content goes in this container -->
      <div data-sticky-container id="top">
        <div  data-sticky data-options="marginTop:0;" style="width:100%">
          <div class="top-row">
            <div class="row column expanded">

              <a href="<?php echo Path::get()->http() ?>" title="Etusivulle">
                <img src="_srcs/img/logo.png" alt="Raision veneseuran logo">
                <span>Raision Veneseura ry</span></a>

            </div>
          </div>
          <!-- "wider" top-bar menu for 'medium' and up -->
          <div id="widemenu" class="top-bar">
            <div class="top-bar-left">
<?php echo $menuBuilder->buildMenu($top_bar_links)->addCssClass('') ?>
            </div>
            <div class="top-bar-right">
            </div>
          </div>
        </div>
      </div>
      <div class="off-canvas-content" data-off-canvas-content>
        <!-- off-canvas title bar for 'small' screen -->
        <div class="title-bar" data-responsive-toggle="widemenu" data-hide-for="medium">
          <div class="title-bar-left">
            <button class="menu-icon" type="button" data-open="offCanvasLeft"></button>
            <span class="title-bar-title">Menu</span>
          </div>
          <div class="title-bar-right">
          </div>
        </div>
        <div class="body">
          <div class="row expanded">
            <div class="column hide-for-small-only medium-3 xxlarge-3">
<?php include '_srcs/templates/sidenav.php'; ?>
            </div>
            <div class="column small-12 medium-9 xlarge-8 end">
              <div class="page">
<?php include '_srcs/templates/pageLoader.php'; ?>
              </div>
            </div>
          </div>
        </div>
        <div class="push"></div>
      </div>
    </div>
    <footer class="footer">
      <div class="row expanded">
        <div class="column small-12 large-6">
          &copy; Raision Veneseura r.y. 
        </div>
        <div class="column small-12 large-6">


        </div>
      </div>
    </footer>
    <script
      src="https://code.jquery.com/jquery-2.2.4.min.js"
      integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.0/js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
<?php
//$html->documentClose();
