<!-- original content goes in this container -->
<div class="off-canvas-content" data-off-canvas-content>
  <div class="row column collapse">
    <div class="page-container" >
      <div class="row collapse">
        <div class="column medium-4 large-3 xlarge-3 hide-for-small-only"> 
          <div class="sidenav" >
            <?php
            $sideNav = $twig->loadTemplate('sidebar.twig');

            echo $sideNav->render(["links" => $lnk]);
            ?>
          </div>
        </div>
        <div class="column small-12 medium-8 large-9 xlarge-9"> 
          <div class="page">
            <?php
            if ($pageName !== NULL) {
              if (is_file("sivut/" . $pageName . ".php")) {
                if ($pageName != "jollalehdet") {
                $content = $mdParser->parse(executeToString("sivut/" . $pageName . ".php"));
                } else {
                  $content = Sphp\Util\FileUtils::executePhpToString("sivut/jollalehdet.php");
                }
              } else {
                $content = $mdParser->parse(executeToString("sivut/index.php"));
              }
            } else {
              $content = $mdParser->parse(executeToString("sivut/index.php"));
            }
            echo $content;
            ?>
          </div>
        </div>
      </div>
      <?php include "footer.php"; ?>
    </div>
  </div>
</div>
<!-- close wrapper, no more content after this -->
<?php include "endDoc.php"; ?> 
