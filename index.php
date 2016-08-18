<?php
$error = '';
$page = 'home';
$access = ["login", "register", "home", "skel", "header", "footer", "content", "login", "register", "logout"];

if (isset($_GET['page']) && in_array($_GET['page'], $access))
{
	$page = $_GET['page'];
}
$accessTraitement = ["login", "register", "logout"];
if (in_array($page, $accessTraitement))
	require('apps/traitement_'.$page.'.php');
require('apps/skel.php');
?>