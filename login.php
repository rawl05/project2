<?php include('includes/registration_inc.php') ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> User Login</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div class="container">
      <div class="login-box">
      <h2 class="link">Login Here</h2>
      <form class="" action="login.php" method="post">
        <div class="form-group">
          <label class="link">Email:</label>
          <input type="text" name="email" class="form-control" placeholder="Email" required>
          <label class="link">Password:</label>
          <input type="password" name="password" class="form-control" placeholder="Password" required><br>
          <button type="submit" name="login_user" class="btn btn-success">Login</button>
          <a class="link" href="register.php">New User? Register Here!</a>
        </div>
      </form>
      </div>
    </div>
  </body>
</html>
