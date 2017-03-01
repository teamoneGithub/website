<?php
  ini_set('display_errors', 1);
  include_once ('init_facebook_php_sdk.php'); 
  session_start();

  $helper = $fb->getRedirectLoginHelper();
  try {
    $accessToken = $helper->getAccessToken();
  } catch(Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
  } catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
  }
 
  if (isset($accessToken)) {
    // Logged in!
    $_SESSION['facebook_access_token'] = (string) $accessToken;

    // Now you can redirect to another page and use the
    // access token from $_SESSION['facebook_access_token']
    header( 'Location: http://athena.ecs.csus.edu/~teamone/index.html' ) ;
  } else {
    header( 'Location: http://athena.ecs.csus.edu/~teamone/login_page.html' ) ;
  }
?>
