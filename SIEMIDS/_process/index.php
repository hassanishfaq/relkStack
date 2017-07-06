<?php
// Point to where you downloaded the phar
include('httpful.phar');
//include ('./Httpful/Bootstrap.php'); 
// And you're ready to go!
//$response = \Httpful\Request::get('http://example.com')->send();
//header('Content-Type: application/json');
function _process($url,$body)
{
$url = "45.32.109.224:9200/".$url;
//$body = '{"query": {"query_string": {"query": "password check failed for user","fields": ["syslog_message"],"default_operator": "AND"}}}';
$response = \Httpful\Request::get($url)->body($body)->send();
return $r = json_decode($response,true);
//$hits = $r->{'hits'}->{'hits'};
//print_r($hits);
//return $hits[0]->{'_source'}->{'syslog_message'};
//$response = \Httpful\Request::ge;
}
function indicies_count()
{
$url =  '_stats/indices';   
$body = '';
$r = _process($url, $body);
return count($r['indices']);
}

function docs_count()
{
$url =  '_stats';   
$body = '';
$r = _process($url, $body);
$cn = 0;
for($d=0;$d<60;$d++)
{
$tomorrow = date('Y.m.d',strtotime(date('m/d/y') . "-$d days"));
$cn = $cn + $r['indices']['logstash-'.$tomorrow]['primaries']['docs']['count'];
}
return $cn;
}

function sig_syslog_5300()
{
$msg = "Password Check Failed for User (root)";
$url =  '_search';   
$body = '{"query": {"query_string": {"query": "password check failed for user","fields": ["syslog_message"],"default_operator": "AND"}}}';
$r = _process($url, $body);
return array($msg, $r['hits']['total']);
}

function sig_syslog_2501 ()
{  
	$msg = ' Failed Login Attempts'; 
	$url =  '_search';    
	$body = '{ "query":{';
	$body = '"query_string":{  "query":" FAILED LOGIN OR authentication failure OR Authentication failed for OR invalid password for OR LOGIN FAILURE OR auth failure: OR authentication error OR authinternal failed OR Failed to authorize OR Wrong password given for OR login failed OR Auth: Login incorrect OR authentication_failed,",';
	$body = '"fields":[  "syslog_message" ] } } } '; 
	$r = _process($url, $body); 
	return array($msg, print_r($r));
}




?>

