<?php

namespace Entity;

class Player extends AbstractPlayer
{
    protected $playerType;
    private $firstNumber;

    public function __construct($name, $id)
    {
        $this->playerName = $name;
        $this->playerId = $id;
        $this->playerType = 'Common';
    }
    public function generateCombination()
    {
        for ($i = 0; $i < 6; $i++) {
            array_push($this->combination, rand(1, 36));
        }
        $this->firstNumber = $this->combination[0];
    }

    /**
     * @return mixed
     */
    public function getFirstNumber()
    {
        return $this->firstNumber;
    }
}