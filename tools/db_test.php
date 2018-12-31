<?php

echo '<h1>DB Connection Test - END</h1>';

$mysql_container_ip = '127.0.0.1';
$mysql_port         = '3306';
$mysql_username     = 'jrabbit_cbade';
$mysql_password     = 'Jrabbit123*';
$default_db         = 'jrabbit';

echo '<p>Obtaining connection to MySQL Docker Container<br><br>'.
	'<h3>Connection Params</h3><br>'.
	"<b>MySQL Host :</b> $mysql_container_ip : $mysql_port<br>".
	"<b>MySQL User :</b> $mysql_username<br>".
	"<b>MySQL Password :</b> ********<br>".
	'<br></p>';

$conn = mysqli_connect($mysql_container_ip, $mysql_username, $mysql_password, $default_db);
if(!$conn){
	echo '<p><b>ERROR :</b> Unable to connect to MySQL<br>'.
		'<b>MySQL ERROR MSG :</b> '.mysqli_connect_err().'<br>'.
		'<b> MySQL ERROR NO :</b> '.mysqli_connect_errno().'<br>'.
		'</p>';
}else{
	echo "<p><b>Success!</b> Successfully obtained a connection to the MySQL Database $default_db<br>".
		'<b>Connected Host Info : </b>'.mysqli_get_host_info($conn).'<br>'.
		'</p>';
}

echo '<p><b>Closed connection to MySQL, Good Bye</b></p>';
mysqli_close($conn);
echo '<h1>DB Connection Test - END</h1>';

?>
