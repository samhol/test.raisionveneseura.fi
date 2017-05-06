<?php

namespace Sphp\Html\Foundation\Sites\Containers;
?>
#Jäsenhakemus

Täytä jäsenhakemuslomake, tai lähetä nimesi, osoitteesi ja puhelinnumerosi sähköpostina 
osoitteeseen toimisto@raisionveneseura.fi, niin otamme sinuun yhteyttä ensitilassa.

<?php

use Sphp\MVC\MemberData;
use Sphp\MVC\MembershipRequestCallout;

// print_r($_SESSION);
if (array_key_exists(MemberData::class, $_SESSION)) {
  $data = $_SESSION[MemberData::class];
  $gen = new MembershipRequestCallout();
  $gen->setMemberData($data);
  $gen->generate()->printHtml();
  unset($_SESSION[MemberData::class]);
} else if (array_key_exists('invalidForm', $_SESSION)) {
  $callout = new Callout();
  $callout->setClosable();
  $callout->setColor('alert');
  $callout->appendMd('##Hakemuksen lähettäminen epäonnistui');
  $callout->appendMd('Lokakkeessa on virheitä');
  $v = $_SESSION['invalidForm'];
  if ($v instanceof \Sphp\Validators\FormValidator) {

    //var_dump($v->getErrors());
    foreach ($v->getInputErrors() as $err) {
      $callout->appendMd(" * Virhe: $err\n");
    }
  }
  if (is_string($v)) {
    $callout->appendMd($v);
  }
  //$callout->append($_SESSION['invalidForm']->getErrors());
  $callout->appendMd('Yritä uudelleen');
  $callout->printHtml();
  unset($_SESSION['invalidForm']);
}

namespace Sphp\Html\Forms\Inputs\Menus;

use Sphp\Security\CRSFToken;

$newToken = CRSFToken::instance()->generateToken('membership');

use Sphp\Stdlib\Path;

$action = Path::get()->http() . "forms/membership.php";
?>

<form data-abide novalidate method="post" action="<?php echo $action ?>">
  <h2>Jäsenhakemuslomake</h2>
  <input type="hidden" name="membership" value="<?php echo $newToken; ?>">
  <div data-abide-error class="alert callout" style="display: none;">
    Jäsenhakemuksesi sisältää virheitä
  </div>
  <fieldset class="row">

    <div class="small-12 xlarge-6 columns end">
      <label>Syntymäaika <small class="required">pakollinen juniorijäsenille</small>
        <input name="dob" type="text" placeholder="pp.kk.vvvv" pattern="day_month_year">
        <span class="form-error">
          Anna hakijan syntymäaika muodossa <var>päivä.kuukausi.vuosi</var>. Esim. <?php echo date('j.n.Y') ?>
        </span>
      </label>
    </div> 

  </fieldset>
  <fieldset class="row">
    <div class="small-12 large-6 columns">
      <label>Etunimi <small class="required">pakollinen</small>
        <input name="fname" type="text" placeholder="Etunimi" required>
        <span class="form-error">
          Anna hakijan etunimi
        </span>
      </label>
    </div>
    <div class="small-12 large-6 columns">
      <label>Sukunimi <small class="required">pakollinen</small>
        <input name="lname" type="text" placeholder="Sukunimi" required>
        <span class="form-error">
          Anna hakijan sukunimi
        </span>
      </label>
    </div>
  </fieldset>

  <fieldset class="row">
    <div class="small-12 large-5 columns">
      <label>Katuosoite <small class="required">pakollinen</small>
        <input name="street" type="text" placeholder="Katuosoite" required>
        <span class="form-error">
          Anna hakijan katuosoite
        </span>
      </label>
    </div>
    <div class="small-12 medium-4 large-3 columns">
      <label>Postinumero <small class="required">pakollinen</small>
        <input name="zipcode" type="text" placeholder="Postinumero" required>
        <span class="form-error">
          Anna hakijan postinumero
        </span>
      </label>
    </div>
    <div class="small-12 medium-8 large-4 columns">
      <label>Kotikunta <small class="required">pakollinen</small>
        <input name="city" type="text" placeholder="Kotikunta" required>
        <span class="form-error">Anna hakijan kotikunta</span>
      </label>
    </div>
  </fieldset>
  <fieldset class="row">
    <div class="small-12 medium-8 columns">
      <label>Sähköpostiosoite <small class="required">pakollinen</small>
        <input type="email" name="email" placeholder="Sähköpostiosoite" required pattern="email">
      <span class="form-error">Anna hakijan sähköpostiosoite</span>
      </label>
    </div>
    <div class="small-12 medium-4 columns">
      <label>Puhelinnumero <small class="not-required">vapaaehtoinen</small>
        <input type="text" name="phone" placeholder="Puhelinnumero">
      </label>
    </div>
  </fieldset>

  <fieldset class="row">
    <div class="small-12 columns">
      <label>Lisätiedot <small class="not-required">vapaaehtoinen</small>
        <textarea name="information" placeholder="Muuta tietoa..." rows="7"></textarea>
      </label>
    </div>
  </fieldset>

  <div class="row">
    <fieldset class="small-12 columns">
      <div class="button-group">
        <button class="button" type="submit" value="Submit">Lähetä</button>
        <button class="button alert" type="reset" value="Reset">Tyhjennä</button>
      </div>
    </fieldset>
  </div>
</form>
