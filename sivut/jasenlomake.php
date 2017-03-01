<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<h1>Jäsenhakemus lomake</h1>
<form data-abide novalidate method="post">
  <div data-abide-error class="alert callout" style="display: none;">
    <p><i class="fi-alert"></i> Lomake sisältää virheitä</p>
  </div>
  <div class="row">
    <div class="small-12 columns">
      <label>Nimi <small class="alert">Vaadittu kenttä</small>
        <input type="text" placeholder="Nimi" required pattern="number">
        <span class="form-error">
          Anna nimesi
        </span>
      </label>
    </div>
    <div class="small-12 columns">
      <label>Sähköpostiosoite <small class="alert">Vaadittu kenttä</small>
        <input type="email" placeholder="sähköpostiosoite" aria-describedby="exampleHelpTex" required pattern="email">
      </label>
      <span class="form-error">
          Anna sähköpostiosoitteesi
        </span>
    </div>
  </div>
  <div class="row">
    <fieldset class="large-6 columns align-right">
      <button class="button" type="submit" value="Submit">Lähetä</button>
    </fieldset>
    <fieldset class="large-6 columns">
      <button class="button" type="reset" value="Reset">Tyhjennä</button>
    </fieldset>
  </div>
</form>