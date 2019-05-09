<?php
session_start();


$errors = array();

$con = mysqli_connect('localhost', 'root', '', 'project2') or die("Couldnot connect to database");

$user_check="";
$email="";
if(isset($_POST['register-user'])){


  $fname = mysqli_real_escape_string($con, $_POST['fname']);
  $lname =mysqli_real_escape_string($con, $_POST['lname']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
  $password = mysqli_real_escape_string($con, $_POST['password']);
  $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

  if(empty($fname) || empty($lname) || empty($email) || empty($mobile) || empty($password)){
      array_push($errors,"Empty");
      header("Location: register.php");
      exit();
  }
  else{
      //Check for valid input
      if(!preg_match("/^[a-zA-Z]*$/", $fname) || !preg_match("/^[a-zA-Z]*$/", $lname)){
          array_push($errors,"Invalid Name!");
          header("Location: register.php");
          exit();
      }
      else {
          //check for valid email
          if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            array_push($errors,"invalid Email!");
              header("Location: register.php");
          exit();
            }
          }
      }
      if($password != $cpassword){
          array_push($errors,"Passwords Mismatch");
          header("Location: register.php?register=email");
          exit();
      }

if(null !== $user_check){

  $user_check = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
}


$result = mysqli_query($con, $user_check);
$user = mysqli_fetch_assoc($result);

if($user){
  if($user['email'] === $email){array_push($errors,"Email Already Taken");}
}
if(count($errors)==0){
  $passwordf = md5($password);
  $query = "INSERT INTO users (fname, lname, email, password, mobile) VALUES ('$fname', '$lname', '$email', '$passwordf', '$mobile')";
  mysqli_query($con, $query);
  $_SESSION['email']=$email;
  $_SESSION['success']="You are now logged in!";

  header('location:login.php');
}
}

//login

if(isset($_POST['login_user'])){

    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);


  if(empty($email)){
    array_push($errors,"Email Required!");
  }
  if(empty($password)){
    array_push($errors,"Password Required!");
  }

  if(count($errors) == 0){
    $passwordf = md5($password);

    $query = "SELECT * FROM users WHERE email='$email' AND password='$passwordf'";
    $results = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($results);
    if(mysqli_num_rows($results)){
      $_SESSION['email']= $row['email'];
      $_SESSION['fname']= $row['fname'];
      $_SESSION['user_id']=$row['user_id'];
      $_SESSION['success']="success";
      header('location:task.php');
    }else{
      array_push($errors,"Login Error!");

    }
  }
}
?>
