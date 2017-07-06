<?php
define('hostname', 'localhost');
define('user', 'root');
define('password', '');
define('databaseName', 'interactive_map');
$connect=mysqli_connect(hostname,user,password,databaseName);
mysqli_set_charset($connect, 'utf8mb4');
function prc($connect,$value)
{
	$value = trim($value);
	if($value == "")
	{
		return NULL;
	}
	else
	{
		$value = mysqli_real_escape_string($connect,$value);
	}
	return $value;
	
}

?>
