<?php
if(!isset($_SESSION))
{
    session_start();
}
$con = mysqli_connect('localhost', 'root', '', 'project2') or die("Couldnot connect to database");





  $task_id = mysqli_real_escape_string($con, $_POST['taskid']);
  $date = date_create("2013-03-15");
  $cdate = date_format($date,"Y/m/d");

  $query = "UPDATE tasks SET complete='1', task_cdate= '$cdate' WHERE task_id='$task_id'";
  mysqli_query($con, $query);

 ?>
