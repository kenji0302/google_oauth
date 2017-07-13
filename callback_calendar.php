<?php
/**
 * callback処理
 */

$APP_ID = getenv('APP_ID');
$APP_SECRET = getenv('APP_SECRET');
$OAUTH_CALLBACK ='http://127.0.0.1/callback_calendar.php';

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


$me = file_get_contents("https://www.googleapis.com/oauth2/v3/tokeninfo?access_token={$access_token}");

if ($me === false) {
    echo "error";
    exit;
}
$me_json = json_decode($me);
var_dump($access_token_response);
var_dump($me_json);


////カレンダー一覧取得
//$me = file_get_contents("https://www.googleapis.com/calendar/v3/users/me/calendarList?access_token={$access_token}");
//
//if ($me === false) {
//    echo "error";
//    exit;
//}
//$me_json = json_decode($me);
//var_dump($access_token_response);
//var_dump($me_json);




//カレンダー一覧取得
$calendarId = "calendar_address_example@gmail.com";
$me = file_get_contents("https://www.googleapis.com/calendar/v3/calendars/{$calendarId}/events?access_token={$access_token}");

if ($me === false) {
    echo "error";
    exit;
}
$me_json = json_decode($me);
var_dump($access_token_response);
var_dump($me_json);
