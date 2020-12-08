<?php

namespace Epmnzava\PaypalLaravel;



class PaypalUtil{


   public function fetch_token(string $url,string $authorization) {
$curl = curl_init();

$api_url=$url."/v1/oauth2/token";
curl_setopt_array($curl, array(
  CURLOPT_URL => $api_url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "grant_type=client_credentials",
  CURLOPT_HTTPHEADER => array(
    "authorization: Basic ".$authorization,
    "cache-control: no-cache",
    "content-type: application/x-www-form-urlencoded",
    "postman-token: d99b34bb-eaea-7fd5-945e-62851bb14cb8"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

return $response;
  
}



}