<?php


session_start();
error_reporting(0);
$userID = $_SESSION['userid'];
$userName = $_SESSION['username'];
$sonsorID = $_SESSION['sponsorid'];
$parentID = $_SESSION['parentid'];
$activationDate = $_SESSION['dateactivated'];
$userStatus = $_SESSION['status'];
$userActivationCode = $_SESSION['activationCode'];	

function vrbr(){
	echo '<br>';
}


?>