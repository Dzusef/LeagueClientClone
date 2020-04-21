<?php
function killsCalculator() {
    $probability = rand(0, 100);
    $avgKillsLow = rand(0, 2);
    $avgKillsMid = rand(3, 9);
    $avgKillsHigh = rand(10, 15);
    if ($probability < 20) {
        $kills = $avgKillsLow;
    } elseif ($probability > 80) {
        $kills = $avgKillsHigh;
    } else {
        $kills = $avgKillsMid;
    }
    echo $kills;
}
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>text demo</title>
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    </head>
    <body>
        <?php killsCalculator() ?>
    </body>
</html>
