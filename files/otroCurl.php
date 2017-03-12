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


//$ch = curl_init();
//curl_setopt($ch, CURLOPT_URL, "http://localhost:8080/geoserver/rest/workspaces/BRN/datastores/Roads/external.shp");
$passwordStr = "admin:vS9UI355#ea9";
curl_setopt($ch, CURLOPT_USERPWD, $passwordStr);

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
$data="panoncadcgw.zip";

    curl_setopt($ch, CURLOPT_HTTPHEADER,
    array("Content-Type: application/zip -data-binary @panoncadcgw.shp"));//,



curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$rslt = curl_exec($ch);
$info = curl_getinfo($ch);
echo "\n" . $rslt . "\n";




//POST return code
$successCode = 200;
$buffer = curl_exec($ch);// Execute the curl request
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