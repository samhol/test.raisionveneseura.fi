<?php

/**
 * PersonCalloutGenerator.php (UTF-8)
 * Copyright (c) 2017 Sami Holck <sami.holck@gmail.com>
 */

namespace Sphp\MVC;

use Sphp\Html\Foundation\Sites\Containers\Callout;
use \Sphp\Html\Media\Img;

/**
 * Description of PersonCalloutGenerator
 *
 * @author  Sami Holck <sami.holck@gmail.com>
 * @since   2017-04-29
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPLv3
 * @filesource
 */
class PersonCalloutGenerator extends AbstractComponentGenerator {

  /**
   *
   * @var BoardMemberData 
   */
  private $person;

  public function setPersonData(BoardMemberData $person) {
    $this->person = $person;
    return $this;
  }

  protected function createPicture() {
    $file = str_replace([' ', 'ä', 'ö'], ['_', 'a', 'o'], $this->person->getName());
    $imgPath = "kuvat/hallitus/$file.png";
    if (!is_file($imgPath)) {
      $imgPath = 'http://placehold.it/90x110';
    }
    return new Img($imgPath, $this->person->getName());
  }

  protected function createJobTitles() {
    if ($this->person->getTitle() != null) {
      return "Tehtävät:\n: {$this->person->getTitle()}";
    } else {
      return '';
    }
  }

  protected function createContactInformation() {
    $output = '';
    if ($this->person->hasContactInfo()) {
      $output .= "Yhteystiedot:\n";
      if ($this->person->hasPhoneNumber()) {
        $output .= ": <i class=\"fa fa-phone\"></i> {$this->person->getPhoneNumber()}\n";
      }if ($this->person->hasEmail()) {
        $output .= ": <i class=\"fa fa-envelope\"></i> {$this->person->getEmail()}\n";
      }
    }
    return $output;
  }

  function b(BoardMemberData $person) {
    $callout = new Callout();
    $callout->appendMd(<<<MD
<div class="media-object stack-for-small">
  <div class="media-object-section photo">
    <div class="thumbnail">
      {$this->createPicture()}
    </div>
  </div>
  <div class="media-object-section" markdown="1">
###{$person->getName()}

{$this->createJobTitles()}

{$this->createContactInformation()}

  </div>
</div>  
MD
    );
    return $callout;
  }

  public function generate() {
    return $this->b($this->person);
  }

}
