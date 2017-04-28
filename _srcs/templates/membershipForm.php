<?php

namespace Sphp\Html\Foundation\Sites\Containers;
?>
#Jäsenhakemus

<?php

use Sphp\MVC\MemberData;

// print_r($_SESSION);
if (array_key_exists(MemberData::class, $_SESSION)) {
  $data = $_SESSION[MemberData::class];

  $name = '<u>' . $data->getFname() . ' ' . $data->getLname() . '</u>';
  $callout = new Callout();
  $callout->setClosable();
  $callout->setColor('success');
  $callout->appendMd('##Kiitos hakemuksestasi');
  $callout->appendMd("Käsittelemme henkilön $name jäsenhakemuksen mahdollisimman pian");
  $callout->printHtml();
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

$ageMenu = MenuFactory::rangeMenu(17, 0, 1, 'age');
$ageMenu->prepend(new Option('18', 'Aikuinen ( yli 18-vuotta )', true));

$newToken = CRSFToken::instance()->generateToken('membership');
?>

<form data-abide novalidate method="post" action="http://test.raisionveneseura.fi/forms/membership.php">
  <input type="hidden" name="membership" value="<?php echo $newToken; ?>">
  <div data-abide-error class="alert callout" style="display: none;">
    Jäsenhakemuksesi sisältää virheitä
  </div>
  <fieldset class="row">
    <label>Henkilötiedot</label>
    <div class="small-12 medium-6 large-4 xlarge-3 columns end">
      <label>Ikä
<?php $ageMenu->printHtml() ?>
        <span class="form-error">
          Anna ikäsi
        </span>
      </label>
    </div> 
  </fieldset>
  <fieldset class="row">
    <div class="small-12 large-6 columns">
      <label>Etunimi <small class="alert">(pakollinen)</small>
        <input name="fname" type="text" placeholder="Etunimi" required>
        <span class="form-error">
          Anna etunimesi
        </span>
      </label>
    </div>
    <div class="small-12 large-6 columns">
      <label>Sukunimi <small class="alert">(pakollinen)</small>
        <input name="lname" type="text" placeholder="Sukunimi" required>
        <span class="form-error">
          Anna sukunimesi
        </span>
      </label>
    </div>
  </fieldset>

  <fieldset class="row">
    <label>Osoitetiedot</label>
    <div class="small-12 large-5 columns">
      <label>Katuosoite <small class="alert">(pakollinen)</small>
        <input name="street" type="text" placeholder="Katuosoite" required>
        <span class="form-error">
          Anna latuosoitteesi
        </span>
      </label>
    </div>
    <div class="small-12 medium-4 large-3 columns">
      <label>Postinumero <small class="alert">(pakollinen)</small>
        <input name="zipcode" type="text" placeholder="Postinumero" required>
        <span class="form-error">
          Anna Postinumerosi
        </span>
      </label>
    </div>
    <div class="small-12 medium-8 large-4 columns">
      <label>Kotikunta <small class="alert">(pakollinen)</small>
        <input name="city" type="text" placeholder="Kotikunta" required>
        <span class="form-error">
          Anna kotikuntasi nimi
        </span>
      </label>
    </div>
  </fieldset>
  <fieldset class="row">
    <label>Muut yhteystiedot</label>
    <div class="small-12 medium-8 columns">
      <label>Sähköpostiosoite <small class="alert">(pakollinen)</small>
        <input type="email" name="email" placeholder="Sähköpostiosoite" required pattern="email">
      </label>
      <span class="form-error">Anna sähköpostiosoitteesi</span>
    </div>
    <div class="small-12 medium-4 columns">
      <label>Puhelinnumero <small class="alert">(vapaaehtoinen)</small>
        <input type="text" name="phone" placeholder="012-1234567 tms.">
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
