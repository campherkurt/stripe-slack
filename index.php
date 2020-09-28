<<?php

$postRequest = array(
    'channel' => '<Add channel ID here>',
    'text' => 'hello world :tada:'
);

$headers =  array(
    'Content-type: application/json; charset=UTF-8',
    'Authorization: Bearer <Add OAuth token here'
);


$cURLConnection = curl_init('https://slack.com/api/chat.postMessage');
curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, $headers);
curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, json_encode($postRequest));
curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

$apiResponse = curl_exec($cURLConnection);
curl_close($cURLConnection);

// $apiResponse - available data from the API request
//$jsonArrayResponse = json_decode($apiResponse);

echo 'Response found: <br/>';
echo $apiResponse;

 ?>
