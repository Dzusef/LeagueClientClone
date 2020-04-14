<!DOCTYPE HTML>
<html lang="sv">
   <head>
     <meta charset="utf-8"/>
     <title>LeagueDBLogIn</title>
     <?php $link = mysqli_connect("localhost", "root", "", "leaguedbcopy");
     session_start();
     if($link === false){
         die("ERROR: Could not connect. " . mysqli_connect_error());
     }
     ?>
   </head>
   <body>
     <?php
     $sql = "SELECT Name,Password FROM customeraccounts";
     if($result = mysqli_query($link, $sql)){ ?>
      <form method="post">
        <fieldset>
          <legend>LoL Login</legend>
            <ul>
              <li>
                <label for="uname">Username</label>
                <input type="uname" name="uname">
              </li>
              <li>
                <label for="password">Password</label>
                <input type="password" name="password">
              </li>
            </ul>
          </fieldset>
        <input type="submit" name="login" value="Login">
      </form>
    <?php
      if(isset($_POST['uname']) != "" && (isset($_POST['password'])) != "") {
        $_SESSION['username'] = $_POST['uname'];
        $_SESSION['password'] = $_POST['password'];
        $query = mysqli_query($link,"SELECT Name,Password FROM customeraccounts WHERE Name='".$_SESSION['username']."' AND Password='".$_SESSION['password']."'");
        if (mysqli_num_rows($query) == 1) {
        $sqlStatus = "UPDATE customeraccounts SET Status='Online' WHERE Name='".$_SESSION['username']."'";
        if ($link->query($sqlStatus) === TRUE) {
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
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
         ?>
   </body>
</html>
