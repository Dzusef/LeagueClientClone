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
    return $kills;
}

function deathsCalculator() {
    $probability = rand(0, 100);
    $avgDeathsLow = rand(0, 2);
    $avgDeathsMid = rand(3, 8);
    $avgDeathsHigh = rand(9, 15);
    if ($probability < 20) {
        $deaths = $avgDeathsLow;
    } elseif ($probability > 80) {
        $deaths = $avgDeathsHigh;
    } else {
        $deaths = $avgDeathsMid;
    }
    return $deaths;
}

function assistsCalculator() {
    $probability = rand(0, 100);
    $avgAssistsLow = rand(0, 4);
    $avgAssistsMid = rand(5, 14);
    $avgAssistsHigh = rand(15, 30);
    if ($probability < 20) {
        $assists = $avgAssistsLow;
    } elseif ($probability > 80) {
        $assists = $avgAssistsHigh;
    } else {
        $assists = $avgAssistsMid;
    }
    return $assists;
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
        <?php
        echo "KDA: " . killsCalculator() . "/" . deathsCalculator() . "/" . assistsCalculator();
        ?>
    </body>
</html>
