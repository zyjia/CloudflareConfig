<?php

function requestAPI($url, $data) {

// 初始化curl
$ch = curl_init();

// 设置URL参数为GET字符串
$get_params = http_build_query($data);
$url = $url . '?' . $get_params;

// 设置请求选项
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPGET, true); 

// 忽略SSL验证
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

// 执行请求
$result = curl_exec($ch);

// 关闭curl
curl_close($ch);
  
return $result;

}

$ipFile = 'ip/ipv4.txt';
$ipAddresses = file($ipFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$selectedIPs = array_rand(array_flip($ipAddresses), 1000);

foreach ($selectedIPs as $selectedIP) {
    //$configStrings[] = generateVlessConfig($uuid, trim($selectedIP), $host, $sni);
   $ip = trim($selectedIP);

    // 调用提交IP的API
   $result = requestAPI('https://box.glms.gq/app/warp/upload.php', ['ip' => $ip]);

   echo '消息:'.$result ;


}


?>
