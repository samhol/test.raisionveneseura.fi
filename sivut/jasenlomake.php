#Jäsenhakemus lomake

<?php
use Sphp\Html\Foundation\Sites\Containers\Callout;
if (array_key_exists('send', $_SESSION)) {
  $name  = '<u>'.$_SESSION['send']['fname'] .' '. $_SESSION['send']['lname'].'</u>';
  $callout = new  Callout();
  $callout->setClosable();
  $callout->appendMd('##Kiitos! ');
  $callout->appendMd("Käsittelemme henkilön $name jäsenhakemuksen mahdollisimman pian");
  $callout->printHtml();
  unset($_SESSION['send']);
}
?>

<form data-abide novalidate method="post" action="http://test.raisionveneseura.fi/_srcs/templates/jasenlomake.php">
  <div data-abide-error class="alert callout" style="display: none;">
    <p><i class="fi-alert"></i> Jäsenhakemuksesi sisältää virheitä</p>
  </div>
  <div class="row">
    <div class="small-12 large-6 columns">
      <label>Etunimi <small class="alert">Vaadittu kenttä</small>
        <input name="fname" type="text" placeholder="Etunimi" required>
        <span class="form-error">
          Anna etunimesi
        </span>
      </label>
    </div>
    <div class="small-12 large-6 columns">
      <label>Sukunimi <small class="alert">Vaadittu kenttä</small>
        <input name="lname" type="text" placeholder="Sukunimi" required>
        <span class="form-error">
          Anna sukunimesi
        </span>
      </label>
    </div>
    
  <div class="row">
    <div class="small-12 large-5 columns">
      <label>Katuosoite <small class="alert">Vaadittu kenttä</small>
        <input name="street" type="text" placeholder="Katuosoite" required>
        <span class="form-error">
          Anna etunimesi
        </span>
      </label>
    </div>
    <div class="small-12 medium-4 large-3 columns">
      <label>Postinumero <small class="alert">Vaadittu kenttä</small>
        <input name="zipcode" type="text" placeholder="Postinumero" required>
        <span class="form-error">
          Anna sukunimesi
        </span>
      </label>
    </div>
    <div class="small-12 medium-8 large-4 columns">
      <label>Kunta <small class="alert">Vaadittu kenttä</small>
        <input name="city" type="text" placeholder="Kunta" required>
        <span class="form-error">
          Anna sukunimesi
        </span>
      </label>
    </div>
    <div class="small-12 columns">
      <label>Sähköpostiosoite <small class="alert">Vaadittu kenttä</small>
        <input type="email" name="email" placeholder="sähköpostiosoite" aria-describedby="exampleHelpTex" required pattern="email">
      </label>
      <span class="form-error">Anna sähköpostiosoitteesi</span>
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
