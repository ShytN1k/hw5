<?php

require __DIR__ . '/../vendor/autoload.php';

use Entity\Lotery;
use Entity\Player;
use Entity\VipPlayer;
use Entity\LoteryController;

$lotery = new Lotery();
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
        $combination = $player->getCombination();

        echo '<br><br>'. $player->getPlayerType(). ' player #'. $i. ' numbers: ';
        foreach ($combination as $number) {
            echo $number. ' ';
        }

        $controller = new LoteryController($lotery, $player);
        $win = $controller->checkWin();
        if ($win != '') {
            echo $win;
        }
    } else {
        $player = new VipPlayer('player'.$i, $i);
        $combination = $player->getCombination();

        echo '<br><br>'. $player->getPlayerType(). ' player #'. $i. ' numbers: ';
        foreach ($combination as $number) {
            echo $number. ' ';
        }

        $controller = new LoteryController($lotery, $player);
        $win = $controller->checkWin();
        if ($win != '') {
            echo $win;
        }
    }

}
