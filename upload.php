<?php


$ipFile = 'ip/ipv4.txt';
$ipAddresses = file($ipFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$selectedIPs = array_rand(array_flip($ipAddresses), 1000);

foreach ($selectedIPs as $selectedIP) {
    //$configStrings[] = generateVlessConfig($uuid, trim($selectedIP), $host, $sni);
   $ip = trim($selectedIP);

    // 调用提交IP的API
   $result = requestAPI('https://box.glms.gq/warp/upload.php', ['ip' => $ip]);

}


echo 'Configurations 数据已上传' ;
?>
