<?php

namespace App\Model;



class Character
{
    public function __construct(private string $id, private string $name, private string $type, private ?string $zanpakuto, private ?string $letter, private ?string $fullbring_type, private string $image, private array $powers)
    {
        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
        $this->zanpakuto = $zanpakuto;
        $this->letter = $letter;
        $this->fullbring_type = $fullbring_type;
        $this->image = $image;
        $this->powers = $powers;
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
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of zanpakuto
     */
    public function getZanpakuto()
    {
        return $this->zanpakuto;
    }

    /**
     * Set the value of zanpakuto
     *
     * @return  self
     */
    public function setZanpakuto($zanpakuto)
    {
        $this->zanpakuto = $zanpakuto;

        return $this;
    }

    /**
     * Get the value of letter
     */
    public function getLetter()
    {
        return $this->letter;
    }

    /**
     * Set the value of letter
     *
     * @return  self
     */
    public function setLetter($letter)
    {
        $this->letter = $letter;

        return $this;
    }

    /**
     * Get the value of fullbring_type
     */
    public function getFullbring_type()
    {
        return $this->fullbring_type;
    }

    /**
     * Set the value of fullbring_type
     *
     * @return  self
     */
    public function setFullbring_type($fullbring_type)
    {
        $this->fullbring_type = $fullbring_type;

        return $this;
    }

    /**
     * Get the value of powers
     */
    public function getPowers()
    {
        return $this->powers;
    }

    /**
     * Set the value of powers
     *
     * @return  self
     */
    public function addPower(Power $power)
    {
        $this->powers[] = $power;

        return $this;
    }

    /**
     * Get the value of image
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }
}
