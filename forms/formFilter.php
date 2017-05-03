<?php
$now = date('Y');
echo $now;
$args = [
    'fname' => FILTER_SANITIZE_STRING,
    'lname' => FILTER_SANITIZE_STRING,
    'dob' => array(
        'filter' => FILTER_VALIDATE_INT,
        'flags' => FILTER_REQUIRE_ARRAY,
        'options' => ['min_range' => 1, 'max_range' => $now]
    ),
    'street' => FILTER_SANITIZE_STRING,
    'zipcode' => FILTER_SANITIZE_STRING,
    'city' => FILTER_SANITIZE_STRING,
    'email' => FILTER_SANITIZE_STRING,
    'phone' => FILTER_SANITIZE_STRING,
    'information' => FILTER_SANITIZE_STRING,
];

return filter_input_array(INPUT_POST, $args);
