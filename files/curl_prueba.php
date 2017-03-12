<?php

// Open log file
$logfh = fopen("GeoserverPHP.log", 'w') or die("can't open log file");

// Initiate cURL session
$service = "http://ssig0.conabio.gob.mx:8080/geoserver/rest/workspaces/";
$request = "myworkspace/datastores/pointlands/";
$url = $service . $request;
$ch = curl_init($url);

// Optional settings for debugging
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //option to return string
curl_setopt($ch, CURLOPT_VERBOSE, true);
curl_setopt($ch, CURLOPT_STDERR, $logfh); // logs curl messages

//Required POST request settings
curl_setopt($ch, CURLOPT_POST, True);
$passwordStr = "admin:vS9UI355#ea9";
curl_setopt($ch, CURLOPT_USERPWD, $passwordStr);

//POST data
curl_setopt($ch, CURLOPT_HTTPHEADER,
array("Content-type: application/zip"));
//$xmlStr = "<workspace><name>test_php</name></workspace>";
$zipStr = "panoncadcgw.zip";
curl_setopt($ch, CURLOPT_POSTFIELDS, $zipStr);

//POST return code
$successCode = 201;
$buffer = curl_exec($ch);// Execute the curl request

$rslt = curl_exec($ch);

echo "\n" . $rslt . "\n";


// Check for errors and process results
$info = curl_getinfo($ch);
if ($info['http_code'] != $successCode) {
$msgStr = "# Unsuccessful cURL request to ";
$msgStr .= $url." [". $info['http_code']. "]\n";
fwrite($logfh, $msgStr);
} else {
$msgStr = "# Successful cURL request to ".$url."\n";
fwrite($logfh, $msgStr);
}
fwrite($logfh, $buffer."\n");

curl_close($ch); // free resources if curl handle will not be reused
fclose($logfh);  // close logfile

?>

