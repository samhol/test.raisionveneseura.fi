<?php
include '../settings.php';

use Zend\Mail;
use Sphp\Stdlib\Path;

//echo '<pre>';
//print_r($_POST);
$fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
$lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING);
$street = filter_input(INPUT_POST, 'street', FILTER_SANITIZE_STRING);
$zipcode = filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_STRING);
$city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$currentDate = date('m.d.Y h:i.s e');
if ($email !== null) {
  //echo 'erger';
  $mail = new Mail\Message();
  $mail->setFrom('jasenhakemus@raisionveneseura.fi');
  $mail->addTo('samiholck@gmail.com');
  $mail->setSubject("Raision veneseuran jäsenhakemus ($fname $lname)");
  $mailBody = "Raision veneseuran jäsenhakemus:\n\n";
  $mailBody .= "\tEtunimi: $fname\n\n";
  $mailBody .= "\tSukunimi: $lname\n\n";
  $mailBody .= "\tOsoite: \n";
  $mailBody .= "\t$street\n";
  $mailBody .= "\t$zipcode $city\n\n";
  $mailBody .= "\tSähköpostiosoite: $email\n";
  $mailBody .= "\tLahetetty: $currentDate\n";
  $mail->setBody($mailBody);
  $transport = new Mail\Transport\Sendmail();
  $transport->send($mail);
  //  25rMxq~1VVtn
  $_SESSION['send'] = ['fname' => $fname, 'lname' => $lname, 'email' => $email];
  $location = $_SERVER['HTTP_REFERER'];
  header("Location: $location");
}
?>
</pre>
