<?php
/* $db_username = 'root';
$db_password = '';
$db_name = 'interactive_map';
$db_host = 'localhost';
$item_per_page = 5;

$mysqli = new mysqli($db_host, $db_username, $db_password, $db_name);
//Output any connection error
if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}
 */
define('hostname', 'localhost');
		define('user', 'root');
		define('password', '');
		define('databaseName', 'interactive_map');
		$connect=mysqli_connect(hostname,user,password,databaseName);
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
			
		}?>