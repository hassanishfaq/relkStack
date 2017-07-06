<?php 
//require 'dbcon.php';
session_start();
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
$messageID=$_GET['message'];
include('_process/httpful.phar');
function _process($url,$body)
{
$url = "45.32.109.224:9200/".$url;
$response = \Httpful\Request::get($url)->body($body)->send();
return $r = json_decode($response,true);
}
?>
<div>
<?php
$sys_tbl= "Select * from signatures where id='$messageID'";
$sys_tbl_result= mysqli_query($cc, $sys_tbl);
while ($sys_tbl_row= mysqli_fetch_assoc($sys_tbl_result))
{
$url =  $sys_tbl_row["url"];    
$body = $sys_tbl_row["body"]; 
$id = $sys_tbl_row["id"];
$r = _process($url, $body);
//print_r($r);
//echo "==================";

?>
<tr>
<td><?php  echo $id ?></td>
<?php
if ( ! isset($r['hits']['hits'][0]['_source']['syslog_timestamp'])) {
$timestamp= $r['hits']['hits'][0]['_source']['syslog_timestamp'] = "null";
//$timestamp= $r['hits']['hits'][0]['_source']['syslog_timestamp'];
}else{
	
$timestamp= $r['hits']['hits'][0]['_source']['syslog_timestamp'];
}
if ( ! isset($r['hits']['hits'][0]['_source']['syslog_hostname'])) {
$hostname= $r['hits']['hits'][0]['_source']['syslog_hostname'] = "null";
}
else{
$hostname=  $r['hits']['hits'][0]['_source']['syslog_hostname'];
}

if ( ! isset($r['hits']['hits'][0]['_source']['received_from'])) {
$hostip= $r['hits']['hits'][0]['_source']['received_from'] = "null";
}
else{
$hostip=  $r['hits']['hits'][0]['_source']['received_from'];
}

if ( ! isset($r['hits']['hits'][0]['_source']['syslog_program'])) {
$program= $r['hits']['hits'][0]['_source']['syslog_program'] = "null";
}
else{
$program=   $r['hits']['hits'][0]['_source']['syslog_program'];
}
if ( ! isset($r['hits']['hits'][0]['_source']['syslog_pid'])) {
$pid= $r['hits']['hits'][0]['_source']['syslog_pid'] = "null";
}
else{
$pid=       $r['hits']['hits'][0]['_source']['syslog_pid'];
}
if ( ! isset($r['hits']['hits'][0]['_source']['syslog_message'])) {
$message= $r['hits']['hits'][0]['_source']['syslog_message'] = "null";
}
else{
$message=   $r['hits']['hits'][0]['_source']['syslog_message'];
}
?>
<td><?php  echo $timestamp ?></td>
<td><?php  echo $hostname ?></td>
<td><?php  echo $hostip ?></td>
<td><?php  echo $program ?></td>
<td><?php  echo $pid ?></td>
<td><?php  echo $message ?></td>
</tr>
<?php
}

$_SESSION['timestamp']= $timestamp;
$_SESSION['hostname']= $hostname;
$_SESSION['hostip']= $hostip;
$_SESSION['program']= $program;
$_SESSION['message']= $message;
?>
</div>

