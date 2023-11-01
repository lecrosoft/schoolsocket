<?php session_start() ?>


<?php

$_SESSION['surname'] = null;
$_SESSION['username'] = null;
$_SESSION['first_name'] = null;
$_SESSION['middle_name'] = null;
$_SESSION['password'] = null;
$_SESSION['email'] = null;
$_SESSION['user_role'] = null;


header("Location: login.php");

?>