<?php
require_once('_srcs/settings.php');
include ('_srcs/templates/htmlHead.php');
$foo = function($vr =4) {
  echo "Polusta $vr ei löytynyt mitään";
};
require_once '_srcs/templates/loaders.php';
$router = new Sphp\MVC\Router();
$router->route('/', $loadIndex);
$router->route('/<:username>', $loadPage);
$router->route('/<#user_id>', $seasonSchedule);
$router->route('/kilpailut/kalastus/<#year>', $loadFishingCompetition);
$router->route('/kilpailut/purjehdus/<#year>', $loadSailingCompetition);
//$router->route('/kilpailut/<*categories>', $loadCompetition);
$router->setDefaultRoute($loadNotFound);
use Sphp\Stdlib\Path;
?>

<body>
 
  <div class="off-canvas-wrapper wrapper">
    <!-- off-canvas left menu -->
    <div class="off-canvas position-left" id="offCanvasLeft" data-off-canvas>
      <button class="close-button" aria-label="Close menu" type="button" data-close>
        <span aria-hidden="true">&times;</span>
      </button>
      <?php include ('_srcs/templates/offcanvasDrilldown.php'); ?>
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
<?php echo $menuBuilder->buildMenu($topbarLinks)->addCssClass('') ?>
          </div>
          <div class="top-bar-right">
          </div>
        </div>
      </div>
    </div>
    <div class="off-canvas-content" data-off-canvas-content>
      <!-- off-canvas title bar for 'small' screen -->
      <div class="title-bar" data-responsive-toggle="widemenu" data-hide-for="large">
        <div class="title-bar-left">
          <button class="menu-icon" type="button" data-open="offCanvasLeft"></button>
          <span class="title-bar-title">Menu</span>
        </div>
        <div class="title-bar-right">
        </div>
      </div>
      <div class="body">
        <div class="row expanded">
          <div class="column show-for-large large-3 xxlarge-3">
            <?php include '_srcs/templates/sidenav.php'; ?>
          </div>
          <div class="column small-12 large-9 xlarge-8 end">
            <div class="page">
              <?php $router->execute(); ?>
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
  <script src="vendor/zurb/foundation/dist/js/foundation.min.js"></script>
  <script>
    $(document).foundation();
  </script>
</body>
</html>
<?php
//$html->documentClose();
