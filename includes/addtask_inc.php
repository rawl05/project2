<?php
if(!isset($_SESSION))
{
    session_start();
}
$con = mysqli_connect('localhost', 'root', '', 'project2') or die("Couldnot connect to database");
$taskname = mysqli_real_escape_string($con, $_POST['taskname']);
 $date = date_create("2013-03-15");
 $user = $_SESSION['user_id'];
 $datef = date_format($date,"Y/m/d");

$query = "INSERT INTO tasks (task_name, task_date, user_id) VALUES ('$taskname', '$datef', '$user')";
mysqli_query($con, $query);


 ?>
