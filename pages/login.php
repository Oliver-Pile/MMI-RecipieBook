<?php
  $User = new User($Conn);
  if($_POST['reg']) {
    if(!$_POST['email']){
      $error = "Email not set";
    } else if(!$_POST['password']) {
      $error = "Password not set";
    } else if(!$_POST['password_confirm']) {
      $error = "Confirm password not set";
    } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $error = "Email address is not valid";
    } else if ($_POST['password'] !== $_POST['password_confirm']) {
        $error = "Password and Confirm Password do not match";
    } else if (strlen($_POST['password']) < 8) {
      $error = "Password must be at least 8 characters in length";
    }if($error) {
      ?>
      <div class="alert alert-danger" role="alert">
        <?php echo $error; ?>
      </div>
      <?php
        }else{
          $attempt = $User->createUser($_POST);
          if($attempt) {
            ?>
            <div class="alert alert-success" role="alert">
              User created - Please login!
            </div>
            <?php
          } else{
            ?>
            <div class="alert alert-danger" role="alert">
              An error occurred, please try again later.
            </div>
            <?php
          }
        }
  } else if($_POST['login']) {
    // Login form submitted
  }
?>
<div class="container">
  <h1 class="mb-4 pb-2">Login or Register</h1>
  <div class="row">
    <div class="col-md-3">
      <form id="login-form" method="post" action="">
        <div class="form-group">
          <label for="login_email">Email address</label>
          <input type="email" class="form-control" id="login_email" name="email">
          </div>
          <div class="form-group">
          <label for="login_password">Password</label>
          <input type="password" class="form-control" id="login_password" name="password">
          </div>
          <button type="submit" name="login" value="1" class="btn btn-studenteat">Login</button>
      </form>
    </div>
    <div class="col-md-3">
      <form id="registration-form" method="post" action="">
        <div class="form-group">
          <label for="reg_email">Email address</label>
          <input type="email" class="form-control" id="reg_email" name="email">
          </div>
          <div class="form-group">
          <label for="reg_password">Password</label>
          <input type="password" class="form-control" id="reg_password" name="password">
          </div>
          <div class="form-group">
          <label for="reg_password_confirm">Confirm Password</label>
          <input type="password" class="form-control" id="reg_password_confirm"
          name="password_confirm">
          </div>
          <button type="submit" name="reg" value="1" class="btn btn-primary">Register</button>            
      </form>
    </div>
  </div>
</div>