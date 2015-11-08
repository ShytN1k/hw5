<?php

namespace Tests;

use Entity\Lotery;

class LoteryTest extends \PHPUnit_Framework_TestCase
{
    public function testGenerateWinCombination()
    {
        $lotery = new Lotery();

        $lotery->generateWinCombination();
        $this->assertNotNull($lotery->getFirstWinNumber());
        $this->assertNotNull($lotery->getWinCombination());
        $this->assertNotNull($lotery->getFiveWinNumbers());
        $this->assertNotNull($lotery->getFourWinNumbers());
    }

    public function testGetFirstNumber()
    {
        $lotery = new Lotery();

        $lotery->generateWinCombination();
        $firstNumber = $lotery->getFirstWinNumber();

        $this->assertNotNull($firstNumber);
        $this->assertGreaterThan(0, $firstNumber);
        $this->assertLessThan(37, $firstNumber);
    }

    public function testGetWinCombination()
    {
        $lotery = new Lotery();

        $lotery->generateWinCombination();
        $winCombintaion = $lotery->getWinCombination();
        $this->assertNotNull($winCombintaion);
        $this->assertArrayHasKey(5, $winCombintaion);
        $this->assertArrayNotHasKey(6, $winCombintaion);
        $this->assertCount(6, $winCombintaion);

        $this->checkMaxMinNumbers($winCombintaion);
    }

    public function testGetFiveNumbers()
    {
        $lotery = new Lotery();

        $lotery->generateWinCombination();
        $winCombintaion = $lotery->getFiveWinNumbers();
        $this->assertNotNull($winCombintaion);
        $this->assertArrayHasKey(4, $winCombintaion);
        $this->assertArrayNotHasKey(5, $winCombintaion);
        $this->assertCount(5, $winCombintaion);

        $this->checkMaxMinNumbers($winCombintaion);
    }

    public function testGetFourNumbers()
    {
        $lotery = new Lotery();

        $lotery->generateWinCombination();
        $winCombintaion = $lotery->getFourWinNumbers();
        $this->assertNotNull($winCombintaion);
        $this->assertArrayHasKey(3, $winCombintaion);
        $this->assertArrayNotHasKey(4, $winCombintaion);
        $this->assertCount(4, $winCombintaion);

        $this->checkMaxMinNumbers($winCombintaion);
    }

    /**
     * @param array $combination
     */
    protected function checkMaxMinNumbers(array $combination)
    {
        foreach ($combination as $winNumber) {
            $this->assertGreaterThan(0, $winNumber);
            $this->assertLessThan(37, $winNumber);
        }
    }
}