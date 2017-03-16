<?php

namespace Sphp\Validators;

use Sphp\Http\Headers\Location;
use Sphp\Stdlib\Path;

require_once ('../settings.php');
$httpRoot = Path::get()->http();
$args = [
    'fname' => FILTER_SANITIZE_STRING,
    'lname' => FILTER_SANITIZE_STRING,
    'age' => ['filter' => FILTER_VALIDATE_INT,
        'options' => ['min_range' => 0, 'max_range' => 18]
    ],
    'street' => FILTER_SANITIZE_STRING,
    'zipcode' => FILTER_SANITIZE_STRING,
    'city' => FILTER_SANITIZE_STRING,
    'email' => FILTER_SANITIZE_STRING,
    'phone' => FILTER_SANITIZE_STRING,
];

$inputs = filter_input_array(INPUT_POST, $args);
if (!is_array($inputs)) {
  (new Location($httpRoot."jasenlomake"))->execute();
}
//print_r($inputs);
//namespace Sphp\Validators;
//print_r($_POST);
$validator = new FormValidator();
$validator->set('fname', new RequiredValueValidator());
$validator->set('lname', new RequiredValueValidator());
$validator->set('age', new RequiredValueValidator());
$validator->set('street', new RequiredValueValidator());
$validator->set('zipcode', new RequiredValueValidator());
$validator->set('city', new RequiredValueValidator());
$validator->set('email', new RequiredValueValidator());

namespace Sphp\MVC;

$currentDate = date('m.d.Y h:i.s e');
if ($validator->isValid($inputs)) {
  $memberData = new MemberData($inputs);
  $applicantData = new MemberData($inputs);
  $mailer = new MemberApplicationMailer();
  $mailer->send($applicantData);

  //  25rMxq~1VVtn
  $_SESSION[MemberData::class] = $applicantData;
  //$_SESSION['send'] = ['fname' => $fname, 'lname' => $lname, 'email' => $email];
  //$location = $_SERVER['HTTP_REFERER'];
  $referef = filter_input(INPUT_SERVER, 'HTTP_REFERER', FILTER_VALIDATE_URL);
  if ($referef === null) {
    $referef = '';
  }
} else {
  $_SESSION['invalidForm'] = $validator;
}
header("Location: $referef");
?>

