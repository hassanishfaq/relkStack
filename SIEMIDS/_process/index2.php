<?php
// Point to where you downloaded the phar
include('./httpful.phar');
//include ('./Httpful/Bootstrap.php'); 
// And you're ready to go!
//$response = \Httpful\Request::get('http://example.com')->send();
header('Content-Type: application/json');
$url = "45.32.109.224:9200/_search/";
$body = '{"query": {"query_string": {"query": "password check failed for user","fields": ["syslog_message"],"default_operator": "AND"}}}';
$response = \Httpful\Request::get($url)->body($body)->send();
$r = json_decode($response);
//print_r($r);
echo "<hr>";
$hits = $r->{'hits'}->{'hits'};
print_r($hits);
echo $hits[0]->{'_source'}->{'syslog_message'}
//$response = \Httpful\Request::ge;
?>