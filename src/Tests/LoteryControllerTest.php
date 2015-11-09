<?php

namespace Tests;

use Entity\LoteryController;

class LoteryControllerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param array $loteryCombination
     * @param array $playerCombination
     * @param $playerName
     * @param $expectedResult
     * @dataProvider checkSixNumbersCommonProvider
     */
    public function testCheckSixNumbersCommon(
        array $loteryCombination,
        array $playerCombination,
        $playerName,
        $expectedResult
    ) {
        $mockLotery = $this->getMockBuilder('Entity\Lotery')->disableOriginalConstructor()->getMock();
        $mockLotery->method('getWinCombination')->willReturn($loteryCombination);

        $mockPlayer = $this->getMockBuilder('Entity\Player')->disableOriginalConstructor()->getMock();
        $mockPlayer->method('getPlayerName')->willReturn($playerName);
        $mockPlayer->method('getCombination')->willReturn($playerCombination);

        $loteryController = new LoteryController($mockLotery, $mockPlayer);

        $this->assertEquals($expectedResult, $loteryController->checkSixNumbersCommon());
    }

    public function checkSixNumbersCommonProvider()
    {
        return [
            [
                [1, 2, 3, 4, 5, 6],
                [1, 2, 3, 4, 5, 6],
                'TestWinnerSixNumbers',
                'Player TestWinnerSixNumbers has won a prize: 1.000.000$ !<br>'
            ],
            [
                [11, 2, 3, 4, 5, 6],
                [1, 2, 33, 4, 5, 6],
                'TestWinnerSixNumbers',
                ''
            ],
            [
                [8, 5, 33, 4, 2, 7],
                [1, 2, 3, 4, 5, 6],
                'TestWinnerSixNumbers',
                ''
            ],
            [
                [1, 2, 3, 4, 5, 7],
                [5, 3, 17, 6, 24, 23],
                'TestWinnerSixNumbers',
                ''
            ]
        ];
    }

    /**
     * @param array $loteryCombination
     * @param array $playerCombination
     * @param $playerName
     * @param $expectedResult
     * @dataProvider checkSixNumbersVipProvider
     */
    public function testCheckSixNumbersVip(
        array $loteryCombination,
        array $playerCombination,
        $playerName,
        $expectedResult
    ) {
        $mockLotery = $this->getMockBuilder('Entity\Lotery')->disableOriginalConstructor()->getMock();
        $mockLotery->method('getWinCombination')->willReturn($loteryCombination);

        $mockPlayer = $this->getMockBuilder('Entity\VipPlayer')->disableOriginalConstructor()->getMock();
        $mockPlayer->method('getPlayerName')->willReturn($playerName);
        $mockPlayer->method('getCombination')->willReturn($playerCombination);

        $loteryController = new LoteryController($mockLotery, $mockPlayer);

        $this->assertEquals($expectedResult, $loteryController->checkSixNumbersVip());
    }

    public function checkSixNumbersVipProvider()
    {
        return [
            [
                [1, 2, 3, 4, 5, 6],
                [2, 3, 4, 5, 6],
                'TestWinnerSixNumbers',
                'Player TestWinnerSixNumbers has won a prize: 1.000.000$ !<br>'
            ],
            [
                [11, 2, 3, 4, 5, 6],
                [2, 33, 4, 5, 6],
                'TestWinnerSixNumbers',
                ''
            ],
            [
                [8, 5, 33, 4, 2, 7],
                [2, 3, 4, 5, 6],
                'TestWinnerSixNumbers',
                ''
            ],
            [
                [1, 2, 3, 4, 5, 7],
                [3, 17, 6, 24, 23],
                'TestWinnerSixNumbers',
                ''
            ]
        ];
    }

    /**
     * @param array $loteryCombination
     * @param array $playerCombination
     * @param $playerName
     * @param $expectedResult
     * @dataProvider checkFiveNumbersCommonProvider
     */
    public function testCheckFiveNumbersCommon(
        array $loteryCombination,
        array $playerCombination,
        $playerName,
        $expectedResult
    ) {
        $mockLotery = $this->getMockBuilder('Entity\Lotery')->disableOriginalConstructor()->getMock();
        $mockLotery->method('getWinCombination')->willReturn($loteryCombination);

        $mockPlayer = $this->getMockBuilder('Entity\Player')->disableOriginalConstructor()->getMock();
        $mockPlayer->method('getPlayerName')->willReturn($playerName);
        $mockPlayer->method('getCombination')->willReturn($playerCombination);

        $loteryController = new LoteryController($mockLotery, $mockPlayer);

        $this->assertEquals($expectedResult, $loteryController->checkFiveNumbersCommon());
    }

    public function checkFiveNumbersCommonProvider()
    {
        return [
            [
                [1, 2, 3, 4, 5, 6],
                [2, 2, 3, 4, 5, 6],
                'TestWinnerFiveNumbers',
                'Player TestWinnerFiveNumbers has won a prize: 500.000$ !<br>'
            ],
            [
                [11, 2, 3, 4, 5, 6],
                [1, 2, 33, 4, 5, 6],
                'TestWinnerFiveNumbers',
                ''
            ],
            [
                [8, 5, 33, 4, 2, 7],
                [1, 2, 3, 4, 5, 6],
                'TestWinnerFiveNumbers',
                ''
            ],
            [
                [1, 2, 3, 4, 5, 7],
                [5, 3, 17, 6, 24, 23],
                'TestWinnerFiveNumbers',
                ''
            ]
        ];
    }

    /**
     * @param array $loteryCombination
     * @param array $playerCombination
     * @param $playerName
     * @param $expectedResult
     * @dataProvider checkFiveNumbersVipProvider
     */
    public function testCheckFiveNumbersVip(
        array $loteryCombination,
        array $playerCombination,
        $playerName,
        $expectedResult
    ) {
        $mockLotery = $this->getMockBuilder('Entity\Lotery')->disableOriginalConstructor()->getMock();
        $mockLotery->method('getWinCombination')->willReturn($loteryCombination);

        $mockPlayer = $this->getMockBuilder('Entity\VipPlayer')->disableOriginalConstructor()->getMock();
        $mockPlayer->method('getPlayerName')->willReturn($playerName);
        $mockPlayer->method('getCombination')->willReturn($playerCombination);

        $loteryController = new LoteryController($mockLotery, $mockPlayer);

        $this->assertEquals($expectedResult, $loteryController->checkFiveNumbersVip());
    }

    public function checkFiveNumbersVipProvider()
    {
        return [
            [
                [1, 2, 3, 4, 5, 6],
                [17, 3, 4, 5, 6],
                'TestWinnerFiveNumbers',
                'Player TestWinnerFiveNumbers has won a prize: 500.000$ !<br>'
            ],
            [
                [11, 2, 3, 4, 5, 6],
                [2, 33, 4, 5, 6],
                'TestWinnerFiveNumbers',
                ''
            ],
            [
                [8, 5, 33, 4, 2, 7],
                [2, 3, 4, 5, 6],
                'TestWinnerFiveNumbers',
                ''
            ],
            [
                [1, 2, 3, 4, 5, 7],
                [3, 17, 6, 24, 23],
                'TestWinnerFiveNumbers',
                ''
            ]
        ];
    }

    /**
     * @param array $loteryCombination
     * @param array $playerCombination
     * @param $playerName
     * @param $expectedResult
     * @dataProvider checkFourNumbersCommonProvider
     */
    public function testCheckFourNumbersCommon(
        array $loteryCombination,
        array $playerCombination,
        $playerName,
        $expectedResult
    ) {
        $mockLotery = $this->getMockBuilder('Entity\Lotery')->disableOriginalConstructor()->getMock();
        $mockLotery->method('getWinCombination')->willReturn($loteryCombination);

        $mockPlayer = $this->getMockBuilder('Entity\Player')->disableOriginalConstructor()->getMock();
        $mockPlayer->method('getPlayerName')->willReturn($playerName);
        $mockPlayer->method('getCombination')->willReturn($playerCombination);

        $loteryController = new LoteryController($mockLotery, $mockPlayer);

        $this->assertEquals($expectedResult, $loteryController->checkFourNumbersCommon());
    }

    public function checkFourNumbersCommonProvider()
    {
        return [
            [
                [1, 2, 3, 4, 5, 6],
                [25, 32, 3, 4, 5, 6],
                'TestWinnerFourNumbers',
                'Player TestWinnerFourNumbers has won a prize: 300.000$ !<br>'
            ],
            [
                [11, 2, 3, 4, 5, 6],
                [1, 2, 33, 4, 5, 6],
                'TestWinnerFourNumbers',
                ''
            ],
            [
                [8, 5, 33, 4, 2, 7],
                [1, 2, 3, 4, 5, 6],
                'TestWinnerFourNumbers',
                ''
            ],
            [
                [1, 2, 3, 4, 5, 7],
                [5, 3, 17, 6, 24, 23],
                'TestWinnerFourNumbers',
                ''
            ]
        ];
    }

    /**
     * @param array $loteryCombination
     * @param array $playerCombination
     * @param $playerName
     * @param $expectedResult
     * @dataProvider checkFourNumbersVipProvider
     */
    public function testCheckFourNumbersVip(
        array $loteryCombination,
        array $playerCombination,
        $playerName,
        $expectedResult
    ) {
        $mockLotery = $this->getMockBuilder('Entity\Lotery')->disableOriginalConstructor()->getMock();
        $mockLotery->method('getWinCombination')->willReturn($loteryCombination);

        $mockPlayer = $this->getMockBuilder('Entity\VipPlayer')->disableOriginalConstructor()->getMock();
        $mockPlayer->method('getPlayerName')->willReturn($playerName);
        $mockPlayer->method('getCombination')->willReturn($playerCombination);

        $loteryController = new LoteryController($mockLotery, $mockPlayer);

        $this->assertEquals($expectedResult, $loteryController->checkFourNumbersVip());
    }

    public function checkFourNumbersVipProvider()
    {
        return [
            [
                [1, 2, 3, 4, 5, 6],
                [17, 31, 4, 5, 6],
                'TestWinnerFourNumbers',
                'Player TestWinnerFourNumbers has won a prize: 300.000$ !<br>'
            ],
            [
                [11, 2, 3, 4, 5, 6],
                [2, 33, 4, 15, 6],
                'TestWinnerFourNumbers',
                ''
            ],
            [
                [8, 5, 33, 4, 2, 7],
                [2, 3, 4, 5, 6],
                'TestWinnerFourNumbers',
                ''
            ],
            [
                [1, 2, 3, 4, 5, 7],
                [3, 17, 6, 24, 23],
                'TestWinnerFourNumbers',
                ''
            ]
        ];
    }

    /**
     * @param array $loteryCombination
     * @param array $playerCombination
     * @param $playerName
     * @param $expectedResult
     * @dataProvider checkOneNumberProvider
     */
    public function testCheckOneNumber(
        array $loteryCombination,
        array $playerCombination,
        $playerName,
        $expectedResult
    ) {
        $mockLotery = $this->getMockBuilder('Entity\Lotery')->disableOriginalConstructor()->getMock();
        $mockLotery->method('getWinCombination')->willReturn($loteryCombination);

        $mockPlayer = $this->getMockBuilder('Entity\Player')->disableOriginalConstructor()->getMock();
        $mockPlayer->method('getPlayerName')->willReturn($playerName);
        $mockPlayer->method('getCombination')->willReturn($playerCombination);

        $loteryController = new LoteryController($mockLotery, $mockPlayer);

        $this->assertEquals($expectedResult, $loteryController->checkOneNumber());
    }

    public function checkOneNumberProvider()
    {
        return [
            [
                [1, 2, 3, 4, 5, 6],
                [1, 32, 3, 4, 15, 6],
                'TestWinnerOneNumber',
                'Player TestWinnerOneNumber has won a prize: 100$ !<br>'
            ],
            [
                [1, 7, 23, 14, 5, 6],
                [1, 32, 20, 8, 15, 9],
                'TestWinnerOneNumber',
                'Player TestWinnerOneNumber has won a prize: 100$ !<br>'
            ],
            [
                [11, 2, 3, 4, 5, 6],
                [1, 2, 33, 4, 5, 6],
                'TestWinnerOneNumber',
                ''
            ],
            [
                [8, 5, 33, 4, 2, 7],
                [1, 2, 3, 4, 5, 6],
                'TestWinnerOneNumber',
                ''
            ],
            [
                [1, 2, 3, 4, 5, 7],
                [5, 3, 17, 6, 24, 23],
                'TestWinnerOneNumber',
                ''
            ]
        ];
    }

    /**
     * @param array $loteryCombination
     * @param array $playerCombination
     * @param $playerName
     * @param $playerType
     * @param $expectedResult
     * @dataProvider checkWinProvider
     */
    public function testCheckWin(
        array $loteryCombination,
        array $playerCombination,
        $playerName,
        $playerType,
        $expectedResult
    ) {
        $mockLotery = $this->getMockBuilder('Entity\Lotery')->disableOriginalConstructor()->getMock();
        $mockLotery->method('getWinCombination')->willReturn($loteryCombination);

        $mockPlayer = $this->getMockBuilder('Entity\Player')->disableOriginalConstructor()->getMock();
        $mockPlayer->method('getPlayerName')->willReturn($playerName);
        $mockPlayer->method('getPlayerType')->willReturn($playerType);
        $mockPlayer->method('getCombination')->willReturn($playerCombination);

        $loteryController = new LoteryController($mockLotery, $mockPlayer);
        $this->assertEquals($expectedResult, $loteryController->checkWin());
    }

    public function checkWinProvider()
    {
        $totalWinCommon = '<br>CONGRATULATIONS!<br>';
        $totalWinCommon .= 'Player TestWinner has won a prize: 1.000.000$ !<br>';
        $totalWinCommon .= 'Player TestWinner has won a prize: 500.000$ !<br>';
        $totalWinCommon .= 'Player TestWinner has won a prize: 300.000$ !<br>';
        $totalWinCommon .= 'Player TestWinner has won a prize: 100$ !<br>';

        $totalWinVip = '<br>CONGRATULATIONS!<br>';
        $totalWinVip .= 'Player TestWinner has won a prize: 1.000.000$ !<br>';
        $totalWinVip .= 'Player TestWinner has won a prize: 500.000$ !<br>';
        $totalWinVip .= 'Player TestWinner has won a prize: 300.000$ !<br>';

        $totalLost = '';
        return [
            [
                [1, 2, 3, 4, 5, 6],
                [1, 2, 3, 4, 5, 6],
                'TestWinner',
                'Common',
                $totalWinCommon
            ],
            [
                [1, 2, 3, 4, 5, 6],
                [2, 3, 4, 5, 6],
                'TestWinner',
                'Vip',
                $totalWinVip
            ],
            [
                [11, 2, 3, 4, 5, 6],
                [1, 2, 33, 4, 5, 6],
                'TestWinner',
                'Common',
                $totalLost
            ],
            [
                [8, 5, 33, 4, 2, 7],
                [1, 2, 3, 4, 5, 6],
                'TestWinner',
                'Common',
                $totalLost
            ],
            [
                [1, 2, 3, 4, 5, 7],
                [5, 3, 17, 6, 24, 23],
                'TestWinner',
                'Vip',
                $totalLost
            ],
            [
                [1, 2, 3, 14, 10, 7],
                [5, 3, 17, 6, 24, 23],
                'TestWinner',
                'Vip',
                $totalLost
            ]
        ];
    }
}
