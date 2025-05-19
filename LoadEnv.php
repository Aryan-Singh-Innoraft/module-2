<?php
require './vendor/autoload.php';
use Dotenv\Dotenv;
/**
 * Class to handle .env file contents.
 */
class LoadEnv {
  /**
   * Function to load .env file key value pairs into $_ENV super global.
   */
  public static function loadDotEnv() {
    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->safeLoad();
  }
}
