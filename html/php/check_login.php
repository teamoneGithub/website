<?php
  session_start();
  $accessToken = $_SESSION['facebook_access_token'];

  if (!isset($accessToken)) {
    header('Location: https://athena.ecs.csus.edu/~teamone/login_page.php');
  }
?>
