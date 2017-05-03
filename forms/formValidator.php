<?php

namespace Sphp\Validators;
$dobVal = new  FormValidator();
$dobVal->createMessageTemplate(FormValidator::INVALID, 'Syntymäaika on virheellinen');
$dobVal->set('y', new RangeValidator(1900, 2017, false));
$dobVal->set('m', new RangeValidator(1, 12, false));
$dobVal->set('d', new RequiredValueValidator());
$validator = new FormValidator();
$validator->set('fname', new RequiredValueValidator());
$validator->set('lname', new RequiredValueValidator());
$validator->set('dob', $dobVal);
$validator->set('street', new RequiredValueValidator());
$validator->set('zipcode', new RequiredValueValidator());
$validator->set('city', new RequiredValueValidator());
$validator->set('email', new RequiredValueValidator());
return $validator;
