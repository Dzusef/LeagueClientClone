<?php $link = mysqli_connect("localhost", "User", "UqyusUBDFESo6LxI", "leaguedbcopy");
session_start();
if($link === false){
   die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
