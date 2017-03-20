<?php

namespace Sphp\Validators;

$validator = new FormValidator();
$validator->set('fname', new RequiredValueValidator());
$validator->set('lname', new RequiredValueValidator());
$validator->set('age', new RequiredValueValidator());
$validator->set('street', new RequiredValueValidator());
$validator->set('zipcode', new RequiredValueValidator());
$validator->set('city', new RequiredValueValidator());
$validator->set('email', new RequiredValueValidator());
return $validator;
