<?php
//sleep(2);
include("config.inc.php"); //include config file
ini_set("allow_url_fopen", 1);

//sanitize post value
$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);

//throw HTTP error if page number is not valid
if(!is_numeric($page_number)){
    header('HTTP/1.1 500 Invalid page number!');
    exit;
}

//get current starting point of records

 $item_per_page="10";

$position = (($page_number-1) * $item_per_page);


//fetch records using page position and item per page. 
$results = $connect->prepare("SELECT  `id`, `ip`, `title`,`dat_time` FROM `map` ORDER BY id ASC LIMIT ?, ?");

//bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
//for more info https://www.sanwebe.com/2013/03/basic-php-mysqli-usage
$results->bind_param("ss", $position, $item_per_page); 
$results->execute(); //Execute prepared Query
$results->bind_result($id, $ip, $title, $description); //bind variables to prepared statement
$i=0;
//output results from database
while($results->fetch()){ //fetch values

	/* $ip;
	$ip_with_page = "https://freegeoip.net/json/$ip";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL, $ip_with_page);
	$result = curl_exec($ch);
	curl_close($ch);
	$obj = json_decode($result, true); */
	//print_r($obj);
	?>
	<table class="table">
	<tbody>
		<tr onmouseover="toggleBounce(<?php echo $i; ?>);" onmouseout="stopBounce(<?php echo $i; ?>);">
			<td style="width:400px; "><?php echo $ip; ?></td>
			<td style="width:400px;"><?php echo $title; ?></td>
			<td style="width:325px;"><?php echo $description; ?></td>
		</tr>
	</tbody>
	</table>
	
	<?php
	$i++;
}