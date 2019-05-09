<?php
if(!isset($_SESSION))
{
    session_start();
}
$con = mysqli_connect('localhost', 'root', '', 'project2') or die("Couldnot connect to database");





  $task_id = mysqli_real_escape_string($con, $_POST['taskid']);

  $query = "UPDATE tasks SET status='0' WHERE task_id='$task_id'";
  mysqli_query($con, $query);

 ?>
