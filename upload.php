<?php

function requestAPI($url, $data) {

  // 初始化curl
  $ch = curl_init();

  // 设置请求选项 
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

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
   $result = requestAPI('https://box.glms.gq/warp/upload.php', ['ip' => $ip]);

   echo '消息:'.$result ;


}


?>
