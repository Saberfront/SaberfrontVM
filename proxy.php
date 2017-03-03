<?php
require_once("bootstrap/autoload.php");

use GuzzleHttp\Client;

$client = new Client();

$response = $client->request('GET', 'http://25.31.70.190/saberfrontdb2/api/' .$_GET["apiEndpoint"], ['debug' => false,'verify' => false,
    'headers'        => ['User-Agent' => 'Saberfront/DSProxy 1.0','Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjJjMjA4MWU4ODZmMGJiZTI5MTkyNmQzNzNiY2MxZWIyMzM3MzZlMDUzN2QwMjc0YTdhMDU2YTMzYmE3Nzg2MjliNjZlYjAxYjdkZDQ3OGFlIn0.eyJhdWQiOiIxIiwianRpIjoiMmMyMDgxZTg4NmYwYmJlMjkxOTI2ZDM3M2JjYzFlYjIzMzczNmUwNTM3ZDAyNzRhN2EwNTZhMzNiYTc3ODYyOWI2NmViMDFiN2RkNDc4YWUiLCJpYXQiOjE0ODg0NzgzMjksIm5iZiI6MTQ4ODQ3ODMyOSwiZXhwIjoxNDg5NzcwNzI2LCJzdWIiOiIxIiwic2NvcGVzIjpbIm1hbmFnZV9zZWNvbmRhcnlfaW52ZW50b3JpZXMiXX0.g96Yz4kdngvRkwlIg0sDGAIf6ZWnCXq2oj5X6sbpBuKShHK1MIyaybXD-iXXHI9i67NOBHDvewqaQ7YFuBZ7dBrL4udK2BUy_nBxYtjmKxtOLAp56L0pLCJWI_sasMjEhtE2spWReIZXKRz8IDlrHAMz6mv6zF9Hkqkuvtv1l7N8VgwVZknw9JAFOKla8x9pIudF8dU_o4N2jWUB0Nds8P9dgAYz6g2klFM5o_fSGI-dOl8O7grLCBg8oserUZMhmSZtL0jEcbUSlUkdkpBIXn0P28txXaRQ-KWejCmZj1gRYzthMeDRpSfQrRmalu1r1mDePwiChNQMsvWAtWR4qwKozUsBhyvzoXKZ7OY3k5JEeHtgTZMmd7jzt_FCfBMJrkGmPs6EqNbUmkgXLVnp5ZsPXrutsRLaLMo_GYnDBEZlsk7Xrm10kJwdPK5Bdapa5YN07vJMhCj6FKc16zvM7p0KlhkBPfiUioSN5C2c_jfnIWDVeatgxzn6bTkBCQyuSMkHJs2-kTudjeYuueEOAPQ_hvbE27YD3oW7ct5SYjF_ar3HWz6j3TxpHYwSwakZfM42EGNVodNAJ4mxRwnpKwjGgBCyW8PFMa4HozjQtewIG-t7g9LnSFF1D-Pr2scVSdkWhXdcqc-OHWgi74o8vvN0fS6zGYtiMVPAeQ_5Urc',"Accept" => "application/json"]
]);
$body = $response->getBody();
// Implicitly cast the body to a string and echo it
echo $body;

?>