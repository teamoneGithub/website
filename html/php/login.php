<?php
  ini_set('display_errors', 1);
  include_once ('init_facebook_php_sdk.php');
  session_start(); 
 
  $helper = $fb->getRedirectLoginHelper();
  $permissions = ['email']; // Optional permissions
  $loginUrl = $helper->getLoginUrl('https://athena.ecs.csus.edu/~teamone/php/login_callback.php', $permissions);
  header ('Location: ' . $loginUrl);
?>
