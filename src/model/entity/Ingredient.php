<?php
require_once './src/model/entity/Entity.php';

class Ingredient extends Entity
{
    protected int $id;
    protected string $nom;
    protected string $uniteMesure;

    /**
     * @param array|null $donnees
     */
    public function __construct(array $donnees = null)
    {
        if ($donnees !== null) {
            foreach ($donnees as $key => $value) {
                $method = 'set' . ucfirst($key);
                if (method_exists($this, $method)) {
                    $this->$method($value);
                }
            }
        }
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

    public function __hydrate($donnees)
    {
        foreach ($donnees as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
}