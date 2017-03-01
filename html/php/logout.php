<?php
  ini_set('display_errors', 1);
  include_once ('init_facebook_php_sdk.php');
  session_start();
  session_unset();
  session_destroy();
  header ('Location: http://athena.ecs.csus.edu/~teamone/index.html');
?>
