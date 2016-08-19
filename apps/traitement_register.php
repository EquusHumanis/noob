<?php
$errorEmail="";
$errorLogin="";
$errorPwd="";
if (isset($_POST['email'], $_POST['login'], $_POST['pwd1'!= 'pwd2'], $_POST['gender']))
{
	$email=$_POST['email'];
	$login=$_POST['login'];
	$pwd=$_POST['pwd'];
	$gender=$_POST['gender'];
	$isValid = true;
	
	if (strlen($login) < 2 || strlen($login) > 25)
	{
		$errorLogin = 'INCORRECT (entre 2 et 25 caractères)';
		$isValid = false;
	}
	if (strlen($pwd) < 6 || strlen($pwd) > 25)
	{
		$errorPwd = 'INCORRECT (entre 6 et 25 caractères)';
		$isValid = false;
	}
	if ($isValid == true)
	{
		$data = [
			"id"=>uniqid(),
			"email"=>$email,
			"login"=>$login,
			"pwd"=>$pwd,
			"gender"=>$gender
		];
		$fileName='data.json';
		$json = file_get_contents('data.json');
		$tab = json_decode($json, true);
		$tab[] = $data;
		$json = json_encode($tab);
		file_put_contents('data.json', $json);
		// tout est ok y'a pas eu d'erreur
		// header('Location: index.php?page=home');
		exit;
	}
}
?>