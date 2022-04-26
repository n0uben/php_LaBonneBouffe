<?php

class Ingredient
{
    private $id;
    private $nom;
    private $uniteMesure;

    /**
     * @param $nom
     * @param $uniteMesure
     */
    public function __construct($nom, $uniteMesure)
    {
        $this->nom = $nom;
        $this->uniteMesure = $uniteMesure;
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
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getUniteMesure()
    {
        return $this->uniteMesure;
    }

    /**
     * @param mixed $uniteMesure
     */
    public function setUniteMesure($uniteMesure)
    {
        $this->uniteMesure = $uniteMesure;
    }

    public function __hydrate($donnees){
        foreach ($donnees as $key => $value){
            $method = 'set' .ucfirst($key);
            if(method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }
}