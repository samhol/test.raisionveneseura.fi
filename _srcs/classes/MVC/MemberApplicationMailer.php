<?php

/**
 * MemberApplicationMailer.php (UTF-8)
 * Copyright (c) 2017 Sami Holck <sami.holck@gmail.com>
 */

namespace Sphp\MVC;

use Zend\Mail\Message;
use Zend\Mail\Transport\Sendmail;

/**
 * Description of MemberApplicationMailer
 *
 * @author Sami Holck
 */
class MemberApplicationMailer {

  /**
   *
   * @var string 
   */
  private $receiver;

  /**
   * Constructs a new instance
   * 
   * @param string $receiver
   */
  public function __construct($receiver = 'toimisto@raisionveneseura.fi') {
    $this->receiver = $receiver;
  }

  /**
   * 
   * @param  MemberData $data
   * @return self for a fluent interface
   */
  public function send(MemberData $data) {
    $mail = new Message();
    $mail->setFrom('jasenhakemus@raisionveneseura.fi');
    $mail->addTo($this->receiver);
    $mail->setSubject("Raision veneseuran jäsenhakemus ({$data->getFname()} {$data->getLname()})");
    $mail->setBody($this->createMailBody($data));
    $mail->setEncoding('UTF-8');
    $transport = new Sendmail();
    $transport->send($mail);
    return $this;
  }

  /**
   * 
   * @param  MemberData $data
   * @return string mail body as a string
   */
  protected function createMailBody(MemberData $data) {
    $mailBody = "Raision veneseuran jäsenhakemus:\n";
    $mailBody .= "----------------------\n";
    $mailBody .= "HAKIJAN TIEDOT\n";
    if ($data->getAge() < 18) {
      $age = "\tJuniori: {$data->getAge()}-vuotias\n";
    } else {
      $age = "\tAikuinen\n";
    }
    $mailBody .= $age;
    $mailBody .= "\tNimi: {$data->getFname()} {$data->getLname()}\n";
    $mailBody .= "\tOsoite: \n";
    $mailBody .= "\t\t{$data->getStreet()}\n";
    $mailBody .= "\t\t{$data->getZipcode()} {$data->getCity()}\n";
    $mailBody .= "\tSähköpostiosoite: \t{$data->getEmail()}\n";
    if ($data->hasPhoneNumber()) {
      $mailBody .= "\tPuhelinnumero: \t{$data->getPhoneNumber()}\n";
    }
    $mailBody .= "----------------------\n";
    $mailBody .= "\tLahetetty: {$data->getPhoneNumber()}\n";
    return $mailBody;
  }

}
