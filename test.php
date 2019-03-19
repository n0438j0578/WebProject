<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php


$ch = curl_init();
$test = urlencode("อยากจบแล้วอะแงงง");
$test1 = rawurldecode('https://njmessengerbot.herokuapp.com/test/?id=1868064243272013&option=');
curl_setopt($ch, CURLOPT_URL, $test1.rawurldecode($test) );
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
$data = curl_exec($ch);
curl_close($ch);
$data_response = json_decode($data, true);
//echo $data;
$response_status = $data_response['Status'];
$response_message = $data_response['StatusMessage'];
$response_result = $data_response['Result'];
echo ($response_result[0]['message']);


?>