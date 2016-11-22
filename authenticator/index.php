<?php

require_once(dirname(__FILE__).'/../vendor/autoload.php');

if (!file_exists(dirname(__FILE__).'/creds.php')) {
	throw new \Exception(spritnf('Create a file named creds.php in this directory with the following constants defined: SM_CLIENT_ID, SM_CLIENT_SECRET'));
}

require_once(dirname(__FILE__).'/creds.php');

use Spliced\SurveyMonkey\Authenticator;
use Guzzle\Http\Client as HttpClient;

define('SM_REDIRECT_URL', 'http://localhost:8080/index.php');
session_start();

$authenticator = new Authenticator(SM_CLIENT_ID, SM_CLIENT_SECRET, SM_REDIRECT_URL);

$code = isset($_REQUEST['code']) ? $_REQUEST['code'] : null;

if (!$code) {
    header(sprintf('Location: %s', $authenticator->getAuthorizeUrl()));
    exit;
} else {
    try {
        $tokenResponse = $authenticator->getToken( $code);
    } catch (\Exception $e) {
        $error = $e->getMessage();
    }
}

?>
<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <title>SurveyMonkey Authentication</title>
  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>
    <div>
        <a href="/index.php">Authorize</a>
    </div>
    <hr />
    <div id="access-token">
        <?php if (isset($error)): ?>
            <div style="color:red;"><?php echo $error; ?></div>
        <?php else:?>
            <div>Access Token: <?php echo $tokenResponse['access_token']; ?></div>
        <?php endif;?>
    </div>
<body>
</body>
</html>