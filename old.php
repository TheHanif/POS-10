<?php 
require_once 'common/init.php';


if(!isset($_SESSION['hold_session'])){
	$_SESSION['hold_session'] = array();
}

if(isset($_SESSION['terminal_list'])){
	$_SESSION['hold_session'][] = $_SESSION['terminal_list'];
	unset($_SESSION['terminal_list']);	
}

print_f($_SESSION['hold_session']);
//print_f($_SESSION['terminal_list']);
?>