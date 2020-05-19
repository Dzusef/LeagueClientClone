<?php

//Calculating amount of kills
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

//Calculating amount of deaths
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

//Calculating amount of assists
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

//Calculating game duration
$probability = rand(0, 100);
$avgGameTimeLow = rand(15, 25);
$avgGameTimeMed = rand(26,  40);
$avgGameTimeHigh = rand(41, 50);
$avgGameTimeUltraHigh = rand(51, 70);
if ($probability < 15) {
    $gameTime = $avgGameTimeLow;
} elseif ($probability > 85) {
    if ($probability > 95) {
        $gameTime = $avgGameTimeUltraHigh;
    } else {
        $gameTime = $avgGameTimeHigh;
    }
} else {
    $gameTime = $avgGameTimeMed;
}

//Calculating amount of CS (Creep Score)
$probability = rand(0, 100);
$avgCSLow = rand(90, 120);
$avgCSMid = rand(121, 200);
$avgCSHigh = rand(200, 250);
$avgCSUltraHigh = rand(251, 300);
$supProbability = rand(0, 100);
$supAvgCS = rand(20, 40);
if ($supProbability < 20) {
    $gameCS = $supAvgCS . " (supp)";
} else {
    if ($probability < 20) {
        $gameCS = $avgCSLow;
    } elseif ($probability > 80) {
        if ($probability > 95) {
            $gameCS = $avgCSUltraHigh;
        } else {
            $gameCS = $avgCSHigh;
        }
    } else {
        $gameCS = $avgCSMid;
    }
}

//Calculating amount of BE (Blue Essence) rewarded
$BELow = rand(100, 500);
$BEMid = rand(500, 1000);
$BEHigh = rand(1000, 1500);
if ($gameTime < 20) {
    $BEReward = $BELow;
} elseif ($gameTime > 40) {
    $BEReward = $BEHigh;
} else {
    $BEReward = $BEMid;
}

//Writing out the result
echo "<br>KDA: " . $kills . "/" . $deaths . "/" . $assists;
echo "<br>Creep Score: " . $gameCS;
echo "<br>Duration: " . $gameTime . " min";
echo "<br>Blue Essence rewarded: " . $BEReward;

include("Connector.php");

//Inserting rewarded Blue Essence into the database
$updatedBE = $_SESSION['currencyBE'] + $BEReward;
$sqlLogout = "UPDATE customeraccounts SET CurrencyBE=$updatedBE WHERE Name='".$_SESSION['username']."'";
if ($link->query($sqlLogout) === FALSE) {
    echo $link->error;
}
