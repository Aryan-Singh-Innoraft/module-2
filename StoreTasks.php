<?php
/**
 * Helps in storing tasks.
 */
class StoreTasks {
  /**
  * Database connection object.
  *
  * @const object
  */
  private $conn;

  /**
  * Constructor to initialize database connection.
  *
  * @param object $database
  *  Database connection instance (PDO).
  */
  public function __construct(object $conn) {
    $this->conn = $conn;
  }

  /**
   * Helps in storing task to db.
   * 
   * @return void
   */
  public function storeTasks() {
    $task = $_POST["task"];
    // Response that would be sent in frontend.
    $response = [
      "success" => FALSE,
      "message" => ""
    ];
    $sql = "INSERT into tasks (task_def) values (:task)";
    $add = $this->conn->prepare($sql);
    $add->bindParam(':task' , $task);
    $added = $add->execute();

    if ($added) {
      $response["success"] = TRUE;
      $response["message"]= "Task added.";
    } 
    else {
     $response["success"] = FALSE;
     $response["message"]= "Task not added.";
    }
    echo json_encode($response);
  } 
}
?>
   