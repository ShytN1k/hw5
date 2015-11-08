<?php

require __DIR__ . '/../vendor/autoload.php';

use Entity\Lotery;
use Entity\Player;
use Entity\VipPlayer;

$lotery = new Lotery();
$lotery->generateWinCombination();
$win = $lotery->getWinCombination();
$winFive = $lotery->getFiveWinNumbers();
$winFour = $lotery->getFourWinNumbers();

echo '6 win numbers: ';
foreach ($win as $winNumber) {
    echo $winNumber. ' ';
}
echo '<br><br>5 win numbers: ';
foreach ($winFive as $winNumber) {
    echo $winNumber. ' ';
}
echo '<br><br>4 win numbers: ';
foreach ($winFour as $winNumber) {
    echo $winNumber. ' ';
}

for ($i = 0; $i < 10; $i++) {
    $coef = rand(1, 2);
    if ($coef == 1) {
        $player = new Player('player'.$i, $i);
        $player->generateCombination();
        $combination = $player->getCombination();

        echo '<br><br>'. $player->getPlayerType(). ' player #'. $i. ' numbers: ';
        foreach ($combination as $number) {
            echo $number. ' ';
        }
    } else {
        $player = new VipPlayer('player'.$i, $i);
        $player->generateCombination();
        $combination = $player->getCombination();

        echo '<br><br>'. $player->getPlayerType(). ' player #'. $i. ' numbers: ';
        foreach ($combination as $number) {
            echo $number. ' ';
        }
    }

}
