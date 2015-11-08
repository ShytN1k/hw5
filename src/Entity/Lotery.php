<?php

namespace Entity;

class Lotery {

    private $winCombination = array();
    private $firstNumber;
    private $fiveWinNumbers = array();
    private $fourWinNumbers = array();

    /**
     * @return array
     */
    public function getWinCombination()
    {
        return $this->winCombination;
    }

    public function generateWinCombination()
    {
        for ($i = 0; $i < 6; $i++) {
            $newNumber = rand(1, 36);
            array_push($this->winCombination, $newNumber);

            if ($i > 0) {
                array_push($this->fiveWinNumbers, $newNumber);

                if ($i > 1) {
                    array_push($this->fourWinNumbers, $newNumber);
                }
            }
        }

        $this->firstNumber = $this->winCombination[0];
    }

    /**
     * @return mixed
     */
    public function getFirstWinNumber()
    {
        return $this->firstNumber;
    }

    /**
     * @return array
     */
    public function getFiveWinNumbers()
    {
        return $this->fiveWinNumbers;
    }

    /**
     * @return array
     */
    public function getFourWinNumbers()
    {
        return $this->fourWinNumbers;
    }
}