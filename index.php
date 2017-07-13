<html>
<head></head>
<body>
<?php
$APP_ID = getenv('APP_ID');
?>

<h1>Google Oauth テスト</h1>
<h2>プロフィールにアクセス</h2>
<a href="https://accounts.google.com/o/oauth2/auth?client_id=<?php echo $APP_ID?>&response_type=code&scope=profile&access_type=offline&redirect_uri=http://127.0.0.1/callback.php"?>redirect</a>
<h2>カレンダーにアクセス</h2>
<a href="https://accounts.google.com/o/oauth2/auth?scope=<?php echo urlencode('https://www.googleapis.com/auth/calendar')?>&client_id=<?php echo $APP_ID?>&response_type=code&access_type=offline&redirect_uri=http://127.0.0.1/callback_calendar.php"?>redirect</a>

</body>
</html>

