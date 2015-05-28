<?php

require_once 'config.php';
require_once 'db.php';

$walletID = ELOIPOOL_PAYOUT_WALLET;
$password = ELOIPOOL_PAYOUT_WALLET_PASSWORD;

$value = 17;
$address = '1BYe1cDZMfJw7tqu27p7AG8mcjUBsdPhYy';

try {
        //block-5
        $valueInSatoshi = round($value,8) * 100000000;
        
        $url = 'https://blockchain.info/merchant/'.$walletID.'/payment';
        $data = array('password' => $password, 'to' => $address, 'amount' => $valueInSatoshi, 'shared ' => 'false', 'note' => 'Payment from MegaBigPower');
        
        $options = array(
                'http' => array(
                        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                        'method'  => 'POST',
                        'content' => http_build_query($data),
                ),
        );
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        $responseArray = json_decode($result, true);
        //print_r($responseArray);
        if (array_key_exists('tx_hash', $responseArray)) {
            echo "Success:\n";
            echo $responseArray['message']."\n";
            echo $responseArray['tx_hash']."\n";

        } else {
            echo "Error:\n";
            echo $responseArray['error']."\n";
        }
} catch (Exception $e) {
   echo 'Exception at block-5 : ',  $e->getMessage(), "\n";
}

?>