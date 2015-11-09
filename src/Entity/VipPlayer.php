<?php

namespace Entity;

class VipPlayer extends AbstractPlayer
{
    protected $playerType;

    public function __construct($name, $id)
    {
        $this->playerName = $name;
        $this->playerId = $id;
        $this->playerType = 'Vip';
        $this->generateCombination();
    }
    public function generateCombination()
    {
        for ($i = 0; $i < 5; $i++) {
            array_push($this->combination, rand(1, 36));
        }
    }
}