<?php
require './vendor/autoload.php';
require_once  './LoadEnv.php';
/**
 * Helps in connection to the database.
 */
class Database {
  /**
   * Used as single instance of the PDO connection.
   * 
   * @const object
   */
  private static $pdo;
  /**
   * Helps in connection to db.
   * 
   * @return object $pdo
   *  Returns an instance of the pdo connection.
   */
  public static function connect() {
    if (!self::$pdo) {
      LoadEnv::loadDotEnv();
      $servername = $_ENV["servername"];
      $database   = $_ENV["database"];
      $username = $_ENV["username"];
      $password = $_ENV["password"];

      try {
        self::$pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } 
      catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
      }
    }
    return self::$pdo;
  }
}
