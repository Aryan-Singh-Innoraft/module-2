<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/index.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Task</title>
</head>

<body>
  <section class="top-field">
    <div class="container">
      <div class="top-wrapper">
        <h2>Developed To-Do List in PHP using Ajax</h2>
        <form method="post" id="to_do_form" class="form">
          <input type="text" name="task_name" id="task_name" class="input" placeholder="Task..." />
          <button type="submit" name="submit" id="submit" class="btn">Submit</button>
        </form>
      </div>
    </div>
  </section>
  <section class="update-wrapper">
    <div class="container">
      <div class="update-wrapper">
        <form method="post" id="update-form" class="update-form form">
          <input type="text" name="task_name" id="task_name updated-task-name" class="update-input" placeholder="Update Task..." />
          <button type="submit" name="submit" id="submit" class=" update-task-btn">Update</button>
        </form>
      </div>
    </div>
  </section>
  <section class="task-list">
    <div class="container">
      <div class="tasks-wrapper">
        <table class="table ">
          <thead>
            <tr>
              <th>SNo.</th>
              <th>Tasks</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            require 'dbconnect.php';
            $conn = Database::connect();
            $sql = "Select * from tasks;";
            $add = $conn->prepare($sql);
            $fetching_tasks = $add->execute();
            $fetching_tasks = $add->fetchAll(PDO::FETCH_ASSOC);
            $count = 1;
            foreach ($fetching_tasks as $task) {
            ?>
              <tr class="border-bottom">
                <td>
                  <?php echo $count++ ?>
                </td>
                <td>
                  <?php echo $task['task_def'] ?>
                </td>
                <td>
                  <?php if ($task['status'] == FALSE) {
                    echo "Not done";
                  } else {
                    echo "Done";
                  } ?>
                </td>
                <td colspan="2" class="action">

                  <button data-task-id="<?= $task['task_id'] ?>"
                    class="btn-tick">
                    <img src="/assets/images/check-solid.svg" alt="Cross" title="Click to remove">
                  </button>

                  <button data-task-id=<?php echo $task['task_id'] ?>
                    class="btn-remove">
                    <img src="/assets/images/xmark-solid.svg" alt="Tick" title="Click to mark done">
                  </button>


                  <button data-task-id=<?php echo $task['task_id'] ?>
                    class="btn-update">
                    <img src="/assets/images/pen-to-square-solid.svg" alt="Cross" title="Click to update">
                  </button>
                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="js/index.js"></script>
</body>
</html>
