<?php
  define("BASE_PATH", dirname(__DIR__));
  require_once 'router.php';
  $route = new Router();
  $route->direct();
?>
