<?php

namespace App\Model;

class Power
{
    public function __construct(private string $id, private string $character_id, private string $power_name)
    {
        $this->id = $id;
        $this->power_name = $power_name;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of character_id
     */
    public function getCharacter_id()
    {
        return $this->character_id;
    }

    /**
     * Set the value of character_id
     *
     * @return  self
     */
    public function setCharacter_id($character_id)
    {
        $this->character_id = $character_id;

        return $this;
    }

    /**
     * Get the value of power_name
     */
    public function getPower_name()
    {
        return $this->power_name;
    }

    /**
     * Set the value of power_name
     *
     * @return  self
     */
    public function setPower_name($power_name)
    {
        $this->power_name = $power_name;

        return $this;
    }
}
