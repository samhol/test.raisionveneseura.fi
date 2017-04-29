<?php
require_once('_srcs/settings.php');
include ('_srcs/templates/htmlHead.php');

use Sphp\Stdlib\Path;

?>

<div class="off-canvas-wrapper">
  <!-- off-canvas left menu -->
  <div class="off-canvas position-left" id="offCanvasLeft" data-off-canvas data-content-overlay="true" data-content-scroll="false">
    <button class="close-button" aria-label="Close menu" type="button" data-close>
      <span aria-hidden="true">&times;</span>
    </button>
    <?php include ('_srcs/templates/offcanvasDrilldown.php'); ?>
  </div>

  <!-- original content goes in this container -->
  <div data-sticky-container>
    <div  data-sticky class="sticky" data-options="marginTop:0;stickyOn:large" style="width:100%">
      <div class="top-row show-for-large">
        <div class="row column expanded">

          <a href="<?php echo Path::get()->http() ?>" title="Etusivulle">
            <img src="kuvat/logo.png" alt="Raision veneseuran logo">
            <span>Raision Veneseura ry</span></a>

        </div>
      </div>
      <!-- "wider" top-bar menu for 'medium' and up -->
      <div id="widemenu" class="top-bar">
        <div class="top-bar-left">
          <?php echo $menuBuilder->buildMenu($topbarLinks)->addCssClass('') ?>
        </div>
        <div class="top-bar-right">
        </div>
      </div>
    </div>
  </div>
  <div class="off-canvas-content" data-off-canvas-content>
    <div data-sticky-container>
      <div class="sticky" data-sticky data-margin-top="0" style="width:100%">
        <!-- off-canvas title bar for 'small' screen -->
        <div class="title-bar" data-responsive-toggle="widemenu" data-hide-for="large">
          <div class="title-bar-left">
            <button class="menu-icon" type="button" data-open="offCanvasLeft"></button>
            <span class="title-bar-title">Raision Veneseura RY</span>
          </div>
          <div class="title-bar-right">
          </div>
        </div>
      </div>
    </div>
    <div class="body">
      <div class="row expanded small-collapse large-uncollapse">
        <div class="column show-for-large large-3 xxlarge-3">
          <?php include ('_srcs/templates/sidenav.php'); ?>
        </div>
        <div class="column small-12 large-9 xlarge-8 end">

          <?php $router->execute(); ?>
          <?php include ('_srcs/templates/footer.php'); ?>

        </div>
      </div>
    </div>
  </div>
</div>

<?php

use Sphp\Html\Apps\BackToTopButton;

(new BackToTopButton())
        ->setTitle('Takaisin sivun yläosaan')
        ->printHtml();
$html->documentClose();

