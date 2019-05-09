<?php
if(!isset($_SESSION))
{
    session_start();
}
$con = mysqli_connect('localhost', 'root', '', 'project2') or die("Couldnot connect to database");




  $taskid = mysqli_real_escape_string($con, $_POST['taskid']);
  $taskname = mysqli_real_escape_string($con, $_POST['taskname']);
  $taskdate = mysqli_real_escape_string($con, $_POST['taskdate']);
  $taskcdate = mysqli_real_escape_string($con, $_POST['taskcdate']);

  $query = "UPDATE tasks SET task_name='$taskname', task_date='$taskdate', task_cdate='$taskcdate' WHERE task_id='$taskid'";
  mysqli_query($con, $query);

 ?>
