<?php function LoginCheck() {
  include("Connector.php");
  $sql = "SELECT Name,Password FROM customeraccounts";
  if($result = mysqli_query($link, $sql)) {

    if((isset($_POST['uname']) != "") && ((isset($_POST['password'])) != "") ) {
      $query = mysqli_query($link,"SELECT Name,Password FROM customeraccounts WHERE Name='".$_POST['uname']."' AND Password='".$_POST['password']."'");
      $_SESSION['username'] = $_POST['uname'];
      $_SESSION['password'] = $_POST['password'];

      if (mysqli_num_rows($query) == 1) {
        $sqlStatus = "UPDATE customeraccounts SET Status='Online' WHERE Name='".$_SESSION['username']."'";

        if ($link->query($sqlStatus)) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $link->error;
        }
        header('Location: LoggedIn.php');
        exit;

      } else {
          echo "<br>Incorrect";
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
                <label for="uname">*Username</label>
                <input type="uname" name="uname">
              </li>
              <li>
                <label for="password">*Password</label>
                <input type="password" name="password">
              </li>
              <li>
                <label for="password">*Retype Password</label>
                <input type="password" name="password">
              </li>
              <li>
                <label for="password">*Email</label>
                <input type="email" name="email">
              </li>
            </ul>
          </fieldset>
        <input type="submit" name="Register" value="Register">
      </form>
      <?php LoginCheck() ?>
   </body>
</html>
