<?php
$map->connect('default', '', 'default', 'index');
$map->connect('me', 'me', 'user', 'index');		//user's index

$map->connect('i_login', 'i/login', 'api_iuser', 'login');
$map->connect('i_remove', 'i/remove', 'api_ideal', 'remove');
$map->connect('i_dealadd', 'i/dealadd', 'api_ideal', 'add');
$map->connect('logout', 'logout', 'user', 'logout');







# Add a simple route, to test visit:
# http://example.net/routemap/index.php?news/some_title
$map->connect('news_by_title', 'news/:title', 'news', 'show_title');

# map news URL with strong checking; year in [2008..2019]; months in [01..12]
$map->connect('news_by_date', 'news/:year/:month/:day', 'news', 'show',
    array ('year' => '(200[8-9]{1})|(201[0-9]{1})', 'month' => '(0[1-9]{1})|(1[0-2]{1})'),
    array ('year' => date('Y'))
);

# Show that we can tell apart 'news/2008' and 'news/some_title'
# when at least one route has sane requirements.
$map->connect('news_by_year', 'news/:year', 'news', 'show_year', array('year' => '20\d{2}'));


$map->connect('riverlist', 'river/list/:title/:a', 'river', 'index');

$map->connect('wallet_out_day', 'out/day/:day', 'route', 'index');
$map->connect('wallet_out_month', 'out/month/:month', 'route', 'index');
$map->connect('wallet_out_month6', 'out/month6/:month6', 'route', 'index');
$map->connect('wallet_out_all', 'out', 'route', 'out');
$map->connect('wallet_in', 'a/in/:title/:a', 'route', 'index');
$map->connect('wallet_all', 'a/all/:title/:a', 'route', 'index');

$map->connect('wallet_all', 'a/all/:title/:a', 'route', 'index');









