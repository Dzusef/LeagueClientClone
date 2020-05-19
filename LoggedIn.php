<!DOCTYPE HTML>
<html lang="sv">
<head>
    <meta charset="utf-8"/>
    <title>LeagueDBLoggedIn</title>
    <?php include("Connector.php");?>
</head>
<body>
<?php

$queryEmail = mysqli_query($link,"SELECT Email FROM customeraccounts WHERE Name='".$_SESSION['username']."'");
$queryCurrency = mysqli_query($link,"SELECT CurrencyBE FROM customeraccounts WHERE Name='".$_SESSION['username']."'");
$row = mysqli_fetch_array($queryCurrency);
$row2 = mysqli_fetch_array($queryEmail);

$_SESSION['currencyBE'] = intval($row[0]);

echo "<h3> ===/Welcome " . $_SESSION['username'] . "\===</h3>";
echo "<br>Name: " . $_SESSION['username'];
echo "<br>Email: " . strval($row2[0]);
echo "<br>Currency(BE): " . intval($row[0]);

if(array_key_exists('Logout', $_POST)) {
    $sqlLogout = "UPDATE customeraccounts SET Status='Offline' WHERE Name='".$_SESSION['username']."'";
    if ($link->query($sqlLogout) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $link->error;
    }
    header('Location: Login.php');
    exit;
}
?>
<br><br><button type="button" id="addGame">Generate game</button>
<div id="gameStats"></div>
<?php

echo "<br>" . "<br>" . "<br>" . "<br>" . "<br>";
echo "<h3> ===/Friends\===</h3>";
?>
<form method="post">
    <label for="AddFriend">Add Friend:</label>
    <input type="AddFriend" name="AddFriend">
    <input type="submit" name="Add" value="Add">
</form>

<form method="post">
    <br><input type="submit" name="Logout"
               class="button" value="Logout" />
</form>


<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script>
    $(document).ready(function() {
        $("#addGame").click(function () {
            $('#gameStats').load('leaguesim.php')
        });
    });
</script>
</body>
</html>
