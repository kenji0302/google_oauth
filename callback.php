<?php
/**
 * callback処理
 */

$APP_ID = getenv('APP_ID');
$APP_SECRET = getenv('APP_SECRET');
$OAUTH_CALLBACK ='http://127.0.0.1/callback.php';

if (empty($_GET['code'])){
    echo "error";
    exit;
}
$code = $_GET['code'];

//access token取得
$data = array(
    'code' => $code,
    'client_id' => $APP_ID,
    'client_secret' => $APP_SECRET,
    'redirect_uri' => $OAUTH_CALLBACK,
    'grant_type' => 'authorization_code',
);
$context = array(
    "http" => array(
        "method"  => "POST",
        "content" => http_build_query($data)
    )
);
$access_token_response = file_get_contents('https://accounts.google.com/o/oauth2/token', false, stream_context_create($context));

if ($access_token_response === false) {
    echo "error";
    exit;
}

$access_token_response_json = json_decode($access_token_response);
$access_token = ($access_token_response_json->access_token);

//ユーザー情報取得
$me = file_get_contents("https://www.googleapis.com/oauth2/v1/userinfo?access_token={$access_token}");

if ($me === false) {
    echo "error";
    exit;
}
$me_json = json_decode($me);
var_dump($me_json->id);
