<?php

class Etape
{
    private $id;
    private $numEtape;
    private $description;

    /**
     * @param $numEtape
     * @param $description
     */
    public function __construct($numEtape, $description)
    {
        $this->numEtape = $numEtape;
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNumEtape()
    {
        return $this->numEtape;
    }

    /**
     * @param mixed $numEtape
     */
    public function setNumEtape($numEtape)
    {
        $this->numEtape = $numEtape;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

}