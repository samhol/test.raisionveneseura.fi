<?php

$di = new \Zend\Di\Di();
$im = $di->instanceManager();

// add alias for short naming
$im->addAlias('kalastus_linkit', Sphp\MVC\FilePaginator::class, [
    'username' => $config->db->readAdapter->username,
    'password' => $config->db->readAdapter->password,
]);
// add aliases for specific instances
$im->addAlias('dbadapter-readonly', 'MyLibrary\DbAdapter', [
    'username' => $config->db->readAdapter->username,
    'password' => $config->db->readAdapter->password,
]);
$im->addAlias('dbadapter-readwrite', 'MyLibrary\DbAdapter', [
    'username' => $config->db->readWriteAdapter->username,
    'password' => $config->db->readWriteAdapter->password,
]);

// set a default type to use, pointing to an alias
$im->addTypePreference('MyLibrary\DbAdapter', 'dbadapter-readonly');

$movieListerRead = $di->get('MyMovieApp\MovieLister');
$movieListerReadWrite = $di->get('MyMovieApp\MovieLister', [
    'dbAdapter' => 'dbadapter-readwrite',
        ]);
