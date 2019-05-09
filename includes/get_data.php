<?php
if(!isset($_SESSION))
{
    session_start();
}
// db settings
$con = mysqli_connect('localhost', 'root', '', 'project2') or die("Couldnot connect to database");

$user = $_SESSION['user_id'];
$sql = "SELECT * FROM tasks WHERE user_id='$user' AND status='1'" ;
$result = mysqli_query($con, $sql);

while($row = mysqli_fetch_assoc($result)) {
    $array[] = $row;
}

if(count($array)>0){
  $dataset = array(
      "echo" => 1,
      "totalrecords" => count($array),
      "totaldisplayrecords" => count($array),
      "data" => $array
  );
  echo json_encode($dataset);
}
?>
