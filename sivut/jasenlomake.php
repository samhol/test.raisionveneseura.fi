#Jäsenhakemus lomake

<?php
use Sphp\Html\Foundation\Sites\Containers\Callout;
if (array_key_exists('send', $_SESSION)) {
  $name  = '<u>'.$_SESSION['send']['fname'] .' '. $_SESSION['send']['lname'].'</u>';
  $callout = new  Callout();
  $callout->setClosable();
  $callout->setColor('success');
  $callout->appendMd('##Kiitos! ');
  $callout->appendMd("Käsittelemme henkilön $name jäsenhakemuksen mahdollisimman pian");
  $callout->printHtml();
  unset($_SESSION['send']);
}
use Sphp\Html\Forms\Inputs\Menus\MenuFactory;
$ageMenu = MenuFactory::rangeMenu(17, 0, 1, 'age');
$ageMenu->prepend(new Sphp\Html\Forms\Inputs\Menus\Option('18', 'Aikuinen',true));
?>
<div class="callout alert"><h2>LOMAKE EI OLE VIELÄ KÄYTÖSSÄ!</h2></div>
<form data-abide novalidate method="post" action="http://test.raisionveneseura.fi/_srcs/templates/jasenlomake.php">
  <div data-abide-error class="alert callout" style="display: none;">
    <p><i class="fi-alert"></i> Jäsenhakemuksesi sisältää virheitä</p>
  </div>
  <div class="row">
    <div class="small-12 large-2 columns">
      <label>Ikä
        <?php $ageMenu->printHtml() ?>
        <span class="form-error">
          Anna etunimesi
        </span>
      </label>
    </div>
    <div class="small-12 large-5 columns">
      <label>Etunimi <small class="alert">(pakollinen)</small>
        <input name="fname" type="text" placeholder="Etunimi" required>
        <span class="form-error">
          Anna etunimesi
        </span>
      </label>
    </div>
    <div class="small-12 large-5 columns">
      <label>Sukunimi <small class="alert">(pakollinen)</small>
        <input name="lname" type="text" placeholder="Sukunimi" required>
        <span class="form-error">
          Anna sukunimesi
        </span>
      </label>
    </div>
  </div>
    
  <div class="row">
    <div class="small-12 large-5 columns">
      <label>Katuosoite <small class="alert">(pakollinen)</small>
        <input name="street" type="text" placeholder="Katuosoite" required>
        <span class="form-error">
          Anna etunimesi
        </span>
      </label>
    </div>
    <div class="small-12 medium-4 large-3 columns">
      <label>Postinumero <small class="alert">(pakollinen)</small>
        <input name="zipcode" type="text" placeholder="Postinumero" required>
        <span class="form-error">
          Anna sukunimesi
        </span>
      </label>
    </div>
    <div class="small-12 medium-8 large-4 columns">
      <label>Kunta <small class="alert">(pakollinen)</small>
        <input name="city" type="text" placeholder="Kunta" required>
        <span class="form-error">
          Anna sukunimesi
        </span>
      </label>
    </div>
    <div class="small-12 medium-8 columns">
      <label>Sähköpostiosoite <small class="alert">(pakollinen)</small>
        <input type="email" name="email" placeholder="hakijan sähköpostiosoite" required pattern="email">
      </label>
      <span class="form-error">Anna sähköpostiosoitteesi</span>
    </div>
    <div class="small-12 medium-4 columns">
      <label>Puhelinnumero <small class="alert">(vapaaehtoinen)</small>
        <input type="text" name="phone" placeholder="012-1234567 tms.">
      </label>
    </div>
  </div>
  <div class="row">
    <fieldset class="small-12 columns">
      <div class="button-group">
        <button class="button" type="submit" value="Submit">Lähetä</button>
        <button class="button alert" type="reset" value="Reset">Tyhjennä</button>
      </div>
    </fieldset>
  </div>
</form>

<?php

//use Sphp\Stdlib\Path;


//require_once(Path::get()->local('_srcs/templates/jasenlomake.php'));

//print_r($_POST);
?>
