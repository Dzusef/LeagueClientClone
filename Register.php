<?php function Register() {
  include("Connector.php");
  $sql = "SELECT Name,Email FROM customeraccounts";
  if($result = mysqli_query($link, $sql)) {

    if((isset($_POST['uname']) != "") && ((isset($_POST['email'])) != "")) {

      $query = mysqli_query($link,"SELECT Name,Email FROM customeraccounts WHERE Name='".$_POST['uname']."' OR Email='".$_POST['email']."'");
      if (mysqli_num_rows($query) == 1) {
        echo "<br>This username or email already exists, try again.";
        unset($_POST['uname']);
        unset($_POST['email']);

      } else {
          $sqlCreate = "INSERT INTO customeraccounts VALUES (NULL, '".$_POST['uname']."', '".$_POST['password']."', '".$_POST['email']."', 0, 'Online')";
          if ($link->query($sqlCreate)) {
              echo "<br>Your account has been created!";
              $_SESSION['username'] = $_POST['uname'];
              $_SESSION['password'] = $_POST['password'];
              unset($_POST['uname']);
              unset($_POST['email']);
              header('Location: LoggedIn.php');
              exit;
          } else {
              echo "Error updating record: " . $link->error;
          }
        }
      }
  } else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
  }
} ?>

<!DOCTYPE HTML>
<html lang="sv">
   <head>
     <meta charset="utf-8"/>
     <title>LeagueDBRegister</title>
   </head>
   <body>
      <form method="post">
        <fieldset>
          <legend>LoL Register</legend>
            <ul>
              <li>
                <label for="uname">Username</label>
                <input type="uname" name="uname">
              </li>
              <li>
                <label for="password">Password</label>
                <input type="password" name="password">
              </li>
              <li>
                <label for="retype">Retype</label>
                <input type="password" name="retype">
              </li>
              <li>
                <label for="email">Email</label>
                <input type="email" name="email">
              </li>
            </ul>
          </fieldset>
        <input type="submit" name="login" value="Login" formaction='Login.php'>
        <input type="submit" name="Register" value="Register">
      </form>
      <?php Register() ?>
   </body>
</html>
