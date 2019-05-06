
<?php

    $ch = curl_init();
    $test = 'อยากจบแล้วอะแงงง';
    $result= 'https://njmessengerbot.herokuapp.com/test/?id=1868064243272013&option='.$test;
    echo $result;
    curl_setopt_array($ch, [
        CURLOPT_URL => $result
    ]);
    echo curl_exec($ch);

    curl_close($ch);
    
?>