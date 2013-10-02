<?php
session_start();
$var = "test16";
if(!isset($_SESSION[$var])){
	echo "SLEEEEEEEEP";
	sleep(15);
	$_SESSION[$var]=1;
	echo "FIRST";
}
//sleep(1);
echo microtime(1);
?>
