<?php
include_once('_srcs/settings.php');
echo '<pre>';
//print_r($mainLinks);
//print_r($p);
print_r($_SERVER);
print_r($config);

echo $config->email->office;
echo $config->email->webadmin;
include '_srcs/di.php';
echo '</pre>';