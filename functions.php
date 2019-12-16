<?php
include_once('connection.php');
$conDB;
function mres($var){
	
	if (get_magic_quotes_gpc()){//getmagicquotes always false (removed from php5.4)
		$var = stripslashes($var);
	}
	global $conDB;
	return mysqli_real_escape_string($conDB,trim($var));//trim=remove white and extras from right and left
	//mysql_real_escape_string
}
 
function confirm_query($result_set) {
	if (!$result_set) {
	 die("Database query failed: " . mysql_error());
	} else {
		return true;	
	}
}
 
function redirect($locaiont, $delay = 0){
	echo "<meta http-equiv='REFRESH' content='".$delay."; url=".$locaiont."'>";
	exit;
}
 
function display_error(){
	global $error;
	$br = '<br>';
	if (count($error) == 1) $br = '';
	if (!empty($error)){ 
		echo "<div class='error'>";
		foreach($error as $er):
		echo $er . $br;
		endforeach;
		echo "</div>";
	}
}

function set_username($un){
	$u = $un;
}

global $u;

function get_username(){
	global $u;
	echo "get_username";
	return "$u";
}
?>