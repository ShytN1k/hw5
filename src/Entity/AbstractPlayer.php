<?php

namespace Entity;

abstract class AbstractPlayer
{
    protected $playerName;
    protected $playerId;
    protected $combination = array();
    protected $playerType;

    /**
     * @return mixed
     */
    public function getPlayerName()
    {
        return $this->playerName;
    }

    /**
     * @param mixed $playerName
     */
    public function setPlayerName($playerName)
    {
        $this->playerName = $playerName;
    }

    /**
     * @return mixed
     */
    public function getPlayerId()
    {
        return $this->playerId;
    }

    /**
     * @param mixed $playerId
     */
    public function setPlayerId($playerId)
    {
        $this->playerId = $playerId;
    }

    /**
     * @return array
     */
    public function getCombination()
    {
        return $this->combination;
    }

    /**
     * @return mixed
     */
    public function getPlayerType()
    {
        return $this->playerType;
    }

    abstract public function generateCombination();
}