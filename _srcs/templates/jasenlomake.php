<?php

use Zend\Mail;

echo '<pre>';

print_r($_POST);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
if ($email !== null) {
  echo 'erger';
  var_dump($mail = new Mail\Message(),
  $mail->setBody('This is the text of the email.'),
  $mail->setFrom('jasenhakemus@raisionveneseura.fi'),
  $mail->addTo('samiholck@gmail.com', 'Name of recipient'),
  $mail->setSubject('TestSubject'),
  $transport = new Mail\Transport\Sendmail(),
  $transport->send($mail));
  //  25rMxq~1VVtn
}
?>
</pre>
