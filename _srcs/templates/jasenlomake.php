<?php

namespace Sphp\Validators;

include '../settings.php';

use Zend\Mail;
use Sphp\Stdlib\Path;

//namespace Sphp\Validators;
//print_r($_POST);
$validator = new FormValidator();
//$validator->set('fname', new RequiredValueValidator('Ole ystävällinen ja anna etunimesi'));
//$validator->set('lname', new RequiredValueValidator('Ole ystävällinen ja anna sukunimesi'));
if (!$validator->isValid($_POST)) {
  echo $validator->getErrors();
}

namespace Zend\Mail;

//echo '<pre>';
//print_r($_POST);
$age = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT);
$fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
$lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING);
$street = filter_input(INPUT_POST, 'street', FILTER_SANITIZE_STRING);
$zipcode = filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_STRING);
$city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
$currentDate = date('m.d.Y h:i.s e');
if ($email !== null) {
  $mail = new Message();
  $mail->setFrom('jasenhakemus@raisionveneseura.fi');
  $mail->addTo('samiholck@gmail.com');
  $mail->setSubject("Raision veneseuran jäsenhakemus ($fname $lname)");
  $mailBody = "Raision veneseuran jäsenhakemus:\n----------------------\n";
  $mailBody .= "HAKIJAN HENKILÖTIEDOT\n";
  $mailBody .= "\tNimi: $fname $lname\n";
  if ($age < 18) {
    $age = "\tJuniori: $age-vuotias\n";
  } else {
    $age = "\tAikuinen\n";
  }
  $mailBody .= $age;
  $mailBody .= "\tOsoite: \n";
  $mailBody .= "\t\t$street\n";
  $mailBody .= "\t\t$zipcode $city\n";
  $mailBody .= "\tSähköpostiosoite: $email\n";
  $mailBody .= "\tPuhelinnumero: $phone\n----------------------\n";
  $mailBody .= "\tLahetetty: $currentDate\n";
  $mail->setBody($mailBody);
  $transport = new Transport\Sendmail();
  $transport->send($mail);
  //  25rMxq~1VVtn
  $_SESSION['send'] = ['fname' => $fname, 'lname' => $lname, 'email' => $email];
  //$location = $_SERVER['HTTP_REFERER'];
  $referef = filter_input(INPUT_SERVER, 'HTTP_REFERER', FILTER_VALIDATE_URL);
  if ($referef === null) {
    $referef = '';
  }
  header("Location: $referef");
}
?>
</pre>
