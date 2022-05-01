<?php

class Ingredient
{
    private int $id;
    private string $nom;
    private string $uniteMesure;

    /**
     * @param string $nom
     * @param string $uniteMesure
     */
    public function __construct(string $nom, string $uniteMesure)
    {
        $this->nom = $nom;
        $this->uniteMesure = $uniteMesure;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getUniteMesure(): string
    {
        return $this->uniteMesure;
    }

    /**
     * @param string $uniteMesure
     */
    public function setUniteMesure(string $uniteMesure): void
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