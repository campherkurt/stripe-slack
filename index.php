<<?php

$postRequest = array(
    'channel' => 'C01B31YQM39',
    'text' => 'hello world :tada:'
);

$headers =  array(
    'Content-type: application/json; charset=UTF-8',
    'Authorization: Bearer xoxb-1391806062546-1398022628996-E7xlt2cFSpZo79iDCtqVWoag'
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
