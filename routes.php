<?php

require_once __DIR__.'/router.php';

// Views
get('/', 'views/index.php');
get('/home', 'views/home.php');

// Authentication APIs
post('/login', 'apis/bridge-login.php');
post('/signup', 'apis/bridge-signup.php');
get('/logout', 'apis/bridge-logout.php');

// Other APIs
get('/api-get-user', 'apis/api-get-user.php');
post('/save-user', 'apis/api-save-user.php');

any('/404','views/404.php');