<?php

namespace Sphp\Validators;

require_once ('../_srcs/settings.php');

use Sphp\Http\Headers\Location;
use Sphp\Stdlib\Path;
use Sphp\Security\CRSFToken;
use Sphp\MVC\MemberData;
use Sphp\MVC\MemberApplicationMailer;
//echo '<pre>';
unset ($_SESSION['invalidForm']);
 //print_r($_SESSION); print_r($_POST);
$httpRoot = Path::get()->http();
if (!CRSFToken::instance()->verifyPostToken('membership')) {
  //echo "rvgba<s";
  $_SESSION['invalidForm'] = 'Lomake on vanhentunut';
} else {
  $inputs = require_once('formFilter.php');
  
  //echo '<pre>' . print_r($inputs) . '</pre>';
  
  if (!is_array($inputs)) {
    $_SESSION['invalidForm'] = 'no formdata found';
    //(new Location($httpRoot . "jasenlomake"))->execute();
  } else {
    $validator = require_once('formValidator.php');
    
    if ($validator->isValid($inputs)) {
      $memberData = new MemberData($inputs);
      $applicantData = new MemberData($inputs);
      $mailer = new MemberApplicationMailer('sami.holck@gmail.com');
      $mailer->send($applicantData);
      //  25rMxq~1VVtn
      $_SESSION[MemberData::class] = $applicantData;
    } else {
     // echo '<pre>' . $validator->get('dob')->getInputErrors() . '</pre>';
      $_SESSION['invalidForm'] = $validator;
    }
  }
}
(new Location($httpRoot . "jasenhakemus.html"))->execute();
