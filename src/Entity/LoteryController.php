<?php

namespace Entity;

class LoteryController
{
    private $lotery;
    private $player;
    private $playerType;
    private $prizeForSixNumbers = '1.000.000$ !';
    private $prizeForFiveNumbers = '500.000$ !';
    private $prizeForFourNumbers = '300.000$ !';
    private $prizeForOneNumber = '100$ !';

    /**
     * @param Lotery $lotery
     * @param AbstractPlayer $player
     */
    public function __construct(Lotery $lotery, AbstractPlayer $player)
    {
        $this->lotery = $lotery;
        $this->player = $player;
        $this->playerType = $player->getPlayerType();
    }

    /**
     * @return mixed
     */
    public function getPlayerType()
    {
        return $this->playerType;
    }

    /**
     * @return string
     */
    public function getPrizeForSixNumbers()
    {
        return $this->prizeForSixNumbers;
    }

    /**
     * @param string $prizeForSixNumbers
     */
    public function setPrizeForSixNumbers($prizeForSixNumbers)
    {
        $this->prizeForSixNumbers = $prizeForSixNumbers;
    }

    /**
     * @return string
     */
    public function getPrizeForFiveNumbers()
    {
        return $this->prizeForFiveNumbers;
    }

    /**
     * @param string $prizeForFiveNumbers
     */
    public function setPrizeForFiveNumbers($prizeForFiveNumbers)
    {
        $this->prizeForFiveNumbers = $prizeForFiveNumbers;
    }

    /**
     * @return string
     */
    public function getPrizeForFourNumbers()
    {
        return $this->prizeForFourNumbers;
    }

    /**
     * @param string $prizeForFourNumbers
     */
    public function setPrizeForFourNumbers($prizeForFourNumbers)
    {
        $this->prizeForFourNumbers = $prizeForFourNumbers;
    }

    /**
     * @return string
     */
    public function getPrizeForOneNumber()
    {
        return $this->prizeForOneNumber;
    }

    /**
     * @param string $prizeForOneNumber
     */
    public function setPrizeForOneNumber($prizeForOneNumber)
    {
        $this->prizeForOneNumber = $prizeForOneNumber;
    }

    /**
     * @return string
     */
    public function checkWin()
    {
        if ($this->playerType === 'Common') {
            $winMessage = $this->checkSixNumbersCommon();
            $winMessage .= $this->checkFiveNumbersCommon();
            $winMessage .= $this->checkFourNumbersCommon();
            $winMessage .= $this->checkOneNumber();

            $message = '';
            if ($winMessage != '') {
                $message = '<br>CONGRATULATIONS!<br>'. $winMessage;
            }
            return $message;

        } elseif ($this->playerType === 'Vip') {
            $winMessage = $this->checkSixNumbersVip();
            $winMessage .= $this->checkFiveNumbersVip();
            $winMessage .= $this->checkFourNumbersVip();

            $message = '';
            if ($winMessage != '') {
                $message = '<br>CONGRATULATIONS!<br>'. $winMessage;
            }
            return $message;
        } else {
            return '';
        }
    }

    /**
     * @return string
     */
    public function checkSixNumbersCommon()
    {
        $win = true;
        $loteryWinNumbers = $this->lotery->getWinCombination();
        $playerNumbers = $this->player->getCombination();
        for ($i = 0; $i <6; $i++) {
            if ($loteryWinNumbers[$i] !== $playerNumbers[$i]) {
                $win = false;
                break;
            } else {
                $win = true;
            }
        }

        if ($win) {
            $winMessage = 'Player '. $this->player->getPlayerName(). ' has won a prize: ';
            $winMessage .= $this->prizeForSixNumbers. '<br>';
            return $winMessage;
        } else {
            return '';
        }
    }

    /**
     * @return string
     */
    public function checkSixNumbersVip()
    {
        $win = true;
        $loteryWinNumbers = $this->lotery->getWinCombination();
        $playerNumbers = $this->player->getCombination();
        for ($i = 0; $i <5; $i++) {
            if ($loteryWinNumbers[$i+1] !== $playerNumbers[$i]) {
                $win = false;
                break;
            } else {
                $win = true;
            }
        }

        if ($win) {
            $winMessage = 'Player '. $this->player->getPlayerName(). ' has won a prize: ';
            $winMessage .= $this->prizeForSixNumbers. '<br>';
            return $winMessage;
        } else {
            return '';
        }
    }

    /**
     * @return string
     */
    public function checkOneNumber()
    {
        $loteryWinNumbers = $this->lotery->getWinCombination();
        $playerNumbers = $this->player->getCombination();

        if ($loteryWinNumbers[0] !== $playerNumbers[0]) {
            $win = false;
        } else {
            $win = true;
        }


        if ($win) {
            $winMessage = 'Player '. $this->player->getPlayerName(). ' has won a prize: ';
            $winMessage .= $this->prizeForOneNumber. '<br>';
            return $winMessage;
        } else {
            return '';
        }
    }

    /**
     * @return string
     */
    public function checkFiveNumbersCommon()
    {
        $win = true;
        $loteryWinNumbers = $this->lotery->getWinCombination();
        $playerNumbers = $this->player->getCombination();
        for ($i = 1; $i <6; $i++) {
            if ($loteryWinNumbers[$i] !== $playerNumbers[$i]) {
                $win = false;
                break;
            } else {
                $win = true;
            }
        }

        if ($win) {
            $winMessage = 'Player '. $this->player->getPlayerName(). ' has won a prize: ';
            $winMessage .= $this->prizeForFiveNumbers. '<br>';
            return $winMessage;
        } else {
            return '';
        }
    }

    /**
     * @return string
     */
    public function checkFiveNumbersVip()
    {
        $win = true;
        $loteryWinNumbers = $this->lotery->getWinCombination();
        $playerNumbers = $this->player->getCombination();
        for ($i = 1; $i <5; $i++) {
            if ($loteryWinNumbers[$i+1] !== $playerNumbers[$i]) {
                $win = false;
                break;
            } else {
                $win = true;
            }
        }
    /**
     * @return string
     */

        if ($win) {
            $winMessage = 'Player '. $this->player->getPlayerName(). ' has won a prize: ';
            $winMessage .= $this->prizeForFiveNumbers. '<br>';
            return $winMessage;
        } else {
            return '';
        }
    }

    /**
     * @return string
     */
    public function checkFourNumbersCommon()
    {
        $win = true;
        $loteryWinNumbers = $this->lotery->getWinCombination();
        $playerNumbers = $this->player->getCombination();
        for ($i = 2; $i <6; $i++) {
            if ($loteryWinNumbers[$i] !== $playerNumbers[$i]) {
                $win = false;
                break;
            } else {
                $win = true;
            }
        }

        if ($win) {
            $winMessage = 'Player '. $this->player->getPlayerName(). ' has won a prize: ';
            $winMessage .= $this->prizeForFourNumbers. '<br>';
            return $winMessage;
        } else {
            return '';
        }
    }

    /**
     * @return string
     */
    public function checkFourNumbersVip()
    {
        $win = true;
        $loteryWinNumbers = $this->lotery->getWinCombination();
        $playerNumbers = $this->player->getCombination();
        for ($i = 2; $i <5; $i++) {
            if ($loteryWinNumbers[$i+1] !== $playerNumbers[$i]) {
                $win = false;
                break;
            } else {
                $win = true;
            }
        }

        if ($win) {
            $winMessage = 'Player '. $this->player->getPlayerName(). ' has won a prize: ';
            $winMessage .= $this->prizeForFourNumbers. '<br>';
            return $winMessage;
        } else {
            return '';
        }
    }
}
