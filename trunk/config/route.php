<?php
$map->connect('default', '', 'default', 'index');
$map->connect('me', 'me', 'user', 'index');		//user's index

$map->connect('i_login', 'i/login', 'api_iuser', 'login');
$map->connect('i_remove', 'i/remove', 'api_ideal', 'remove');
$map->connect('i_dealadd', 'i/dealadd', 'api_ideal', 'add');
$map->connect('logout', 'logout', 'user', 'logout');


