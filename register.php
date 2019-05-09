<?php include('includes/registration_inc.php') ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> User Registration</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div class="container">
      <div class="login-box">
      <h2 class="link">Register Here</h2>
      <form class=""  method="post">
        <div class="form-group">
          <label class="link">First Name:</label>
          <input type="text" name="fname"  class="form-control" placeholder="First Name" required >
          <label class="link">Last Name:</label>
          <input type="text" name="lname" class="form-control" required placeholder="Last Name">
          <label class="link">Contact(Mobile):</label>
          <input type="text" name="mobile" class="form-control" required placeholder="Mobile">
          <label class="link">Email:</label>
          <input type="text" name="email" class="form-control" required placeholder="Email:">
          <label class="link">Password:</label>
          <input type="password" name="password" class="form-control" required placeholder="Password">
          <label class="link">Confirm Password:</label>
          <input type="password" name="cpassword" class="form-control" required placeholder="Confirm Passsword">
          <br>
          <button type="submit" name="register-user" class="btn btn-primary">Register</button>
            <a class="link" href="login.php">Already User? Login Here!</a>
        </div>
      </form>
      </div>
    </div>
  </body>
</html>
