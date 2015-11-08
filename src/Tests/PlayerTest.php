<?php

namespace Tests;

use Entity\Player;

class PlayerTest extends \PHPUnit_Framework_TestCase
{
    public function testGenerateCombination()
    {
        $player = new Player('player', 2);

        $player->generateCombination();
        $this->assertNotNull($player->getFirstNumber());
        $this->assertNotNull($player->getCombination());
    }

    public function testGetCombination()
    {
        $player = new Player('player', 15);

        $player->generateCombination();
        $combination = $player->getCombination();
        $this->assertNotNull($combination);
        $this->assertArrayHasKey(5, $combination);
        $this->assertArrayNotHasKey(6, $combination);
        $this->assertCount(6, $combination);

        foreach ($combination as $number) {
            $this->assertGreaterThan(0, $number);
            $this->assertLessThan(37, $number);
        }
    }

    public function testGetFirstNumber()
    {
        $player = new Player('player', 23);

        $player->generateCombination();
        $firstNumber = $player->getFirstNumber();
        $this->assertNotNull($firstNumber);
        $this->assertGreaterThan(0, $firstNumber);
        $this->assertLessThan(37, $firstNumber);
    }
}