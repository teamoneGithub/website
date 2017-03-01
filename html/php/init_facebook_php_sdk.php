<?php
  define('FACEBOOK_SDK_V4_SRC_DIR', __DIR__ . '/facebook-sdk-5/');
  require_once __DIR__ . '/facebook-sdk-5/autoload.php';
  
  $fb = new Facebook\Facebook([
    'app_id' => '620330634840868',
    'app_secret' => 'f3888ba01bb8bcf254d416896c46ceb0',
    'default_graph_version' => 'v2.5',
  ]);
?>
