<?php 
//require 'dbcon.php';

define('hostname', 'localhost');
define('user', 'root');
define('password', '');
define('databaseName', 'syslog_db');
$cc=mysqli_connect(hostname,user,password,databaseName);
mysqli_set_charset($cc, 'utf8mb4');
function prc($cc,$value)
{
	$value = trim($value);
	if($value == "")
	{
		return NULL;
	}
	else
	{
		$value = mysqli_real_escape_string($cc,$value);
	}
	return $value;
	
}



if (!$cc) {
die('Could not cc: ' . mysql_error());
}
$category=$_GET['category'];
?>
<select class="form-control select2" style="width: 100%;" name="match_msg" onchange="getMessage(this.value)">
<?php 
$sys_tbl= "Select * from signatures where category='$category'";
$sys_tbl_result= mysqli_query($cc, $sys_tbl);
$match_msg= "Select DISTINCT message from signatures where id='$id'";
$match_msg_result= mysqli_query($cc, $match_msg);
while ($match_msg_row= mysqli_fetch_assoc($match_msg_result)){
$match_msg=$match_msg_row["message"]; 
}
while ($sys_tbl_row= mysqli_fetch_assoc($sys_tbl_result))
{
$match_message=$sys_tbl_row["message"];
if($match_msg == $match_message) { $rsel = "Selected";} else { $rsel = ""; }
?>
<option value="<?php echo $sys_tbl_row['id'];   ?>" <?php echo $rsel; ?>><?php  echo $match_message; ?></option>
<?php 
}
?>
</select>