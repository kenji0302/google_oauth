<?php
$APP_ID = getenv('APP_ID');
?>

<a href="https://accounts.google.com/o/oauth2/auth?client_id=<?php echo $APP_ID?>&response_type=code&scope=profile&redirect_uri=http://127.0.0.1/callback.php"?>redirect</a>

