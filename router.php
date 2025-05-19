<?php
/**
 * Routes incoming requests to the correct PHP file for action.
 */
class Router
{
  /**
   * The URI of the current request.
   * 
   * @var string
   */
  protected $uri;

  /**
   * Constructor that parses and stores the request URI.
   */
  function __construct()
  {
    $this->uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
  }

  /**
   * Helps in routing to the correct file.
   */
  function direct()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      switch ($this->uri) {
        case '/':
        case '':
          require_once './dashboard.php';
          break;
        
        default:
          require_once BASE_PATH . '/app/views/notfound.php';
          break;
      }
    } 
    else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      switch ($this->uri) {
        case '/':
        case '/store':
          require_once './StoreTasks.php';
          require_once './dbconnect.php';
          $db = Database::connect();
          $controller = new StoreTasks($db);
          $controller->storeTasks();
          break;
        case '/remove':
          require_once './RemoveTasks.php';
          require_once './dbconnect.php';
          $db = Database::connect();
          $controller = new PerformTasks($db);
          $controller->deleteTasks();
          break;
        case '/done':
          require_once './RemoveTasks.php';
          require_once './dbconnect.php';
          $db = Database::connect();
          $controller = new PerformTasks($db);
          $controller->doneTasks();
          break;
        case '/update':
          require_once './RemoveTasks.php';
          require_once './dbconnect.php';
          $db = Database::connect();
          $controller = new PerformTasks($db);
          $controller->updateTasks();
          break;
      }
    }
  }
}
