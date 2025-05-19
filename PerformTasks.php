<?php
/**
 * Helps in deleting,updating tasks.
 */
class PerformTasks {
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
  *    Database connection instance (PDO).
  */
  public function __construct(object $conn) {
    $this->conn = $conn;
  }

  /**
   * Helps in deleting tasks from db.
   * 
   * @return void
   */
  public function deleteTasks() {
    $task_id = $_POST["task_id"];
    $sql = "Delete from tasks where task_id=:task_id;";
    $add = $this->conn->prepare($sql);
    $add->bindParam(':task_id' , $task_id);
    $response = FALSE;
    $deleted = $add->execute();
    if ($deleted) {
      $response["success"] = TRUE;
      echo json_encode($response);
    } 
    else {
      $response["success"] = FALSE;
      echo json_encode($response);
    }
  } 

  /**
   * Helps in updating status to done.
   * 
   * @return void
   */
  public function doneTasks() {
    $task_id = $_POST["task_id"];
    $sql = "Update tasks SET status=true where task_id=:task_id;";
    $add = $this->conn->prepare($sql);
    $add->bindParam(':task_id' , $task_id);
    $response = FALSE;
    $deleted = $add->execute();
    if ($deleted) {
      $response["success"] = TRUE;
      echo json_encode($response);
    } 
    else {
      $response["success"] = FALSE;
      echo json_encode($response);
    }
  } 

  /**
   * Helps in updating tasks of the user.
   * 
   * @return void
   */
  public function updateTasks() {
    $task_id = $_POST["task_id"];
    $task = $_POST["task"];
    $sql = "Update tasks SET task_def=:task where task_id=:task_id;";
    $add = $this->conn->prepare($sql);
    $add->bindParam(':task_id' , $task_id);
    $add->bindParam(':task' , $task);
    $response = FALSE;
    $deleted = $add->execute();
    if ($deleted) {
      $response["success"] = TRUE;
      echo json_encode($response);
    } 
    else {
      $response["success"] = FALSE;
      echo json_encode($response);
    }
  }
}
?>
  