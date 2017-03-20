<?php

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

return filter_input_array(INPUT_POST, $args);
