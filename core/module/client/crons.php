<?php
echo "TESTstart";

foreach ( glob(__DIR__.'/cron/*.php') as $cron ) {
  require $cron;
}


// $curl = curl_init();
echo "TESTend";
// curl_setopt_array($curl, array(
//   CURLOPT_URL => 'https://discord.com/api/webhooks/1393636682451914874/XdbNOC4Dq-Z11GpKdA0Ahe6JIH0HsbB8LWxy7CNNvconqeDL_qKaES4MYpqA5Oc2JOP6',
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => '',
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 0,
//   CURLOPT_FOLLOWLOCATION => true,
//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//   CURLOPT_CUSTOMREQUEST => 'POST',
//   CURLOPT_POSTFIELDS =>'{
//     "content":"test123"
// }',
//   CURLOPT_HTTPHEADER => array(
//     'Content-Type: application/json',
//     'Cookie: __cfruid=2323196b2a4bb7a35b527f7635353b5fa84eafa2-1752339306; __dcfduid=507137a47a2911ef9daa92b24e560943; __sdcfduid=507137a47a2911ef9daa92b24e560943bfbec8649541aead8be987d1226466081ad845689cb1e1cb4f926de78c38f074; _cfuvid=X6mD7ZIT6d8as_rk2u9WVZZAw1h9lGSz7uVSrj7Tj0Q-1752339306093-0.0.1.1-604800000'
//   ),
// ));

// $response = curl_exec($curl);

// curl_close($curl);
// echo $response;
echo "TESTend";