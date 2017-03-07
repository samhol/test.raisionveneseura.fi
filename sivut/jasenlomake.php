

<h1>Jäsenhakemus lomake</h1>
<form data-abide novalidate method="post" action="http://test.raisionveneseura.fi/?page=jasenlomake">
  <div data-abide-error class="alert callout" style="display: none;">
    <p><i class="fi-alert"></i> Lomake sisältää virheitä</p>
  </div>
  <div class="row">
    <div class="small-12 columns">
      <label>Nimi <small class="alert">Vaadittu kenttä</small>
        <input name="name" type="text" placeholder="Nimi" required>
        <span class="form-error">
          Anna nimesi
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
        <button class="button" type="reset" value="Reset">Tyhjennä</button>
      </div>
    </fieldset>
  </div>
</form>

<?php

use Sphp\Stdlib\Path;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once(Path::get()->local('_srcs/templates/jasenlomake.php'));

print_r($_POST);
?>