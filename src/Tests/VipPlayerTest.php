<?php

namespace Tests;

use Entity\VipPlayer;

class VipPlayerTest extends \PHPUnit_Framework_TestCase
{
    public function testGetCombination()
    {
        $player = new VipPlayer('player', 15);

        $player->generateCombination();
        $combination = $player->getCombination();
        $this->assertNotNull($combination);
        $this->assertArrayHasKey(4, $combination);
        $this->assertArrayNotHasKey(5, $combination);
        $this->assertCount(5, $combination);

        foreach ($combination as $number) {
            $this->assertGreaterThan(0, $number);
            $this->assertLessThan(37, $number);
        }
    }
}