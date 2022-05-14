<?php
require_once './src/model/entity/Entity.php';

class Region extends Entity
{
    protected int $id;
    protected string $nom;

    /**
     * @param string|null $nom
     */
    public function __construct(string $nom = null)
    {
        if ($nom !== null) {
            $this->nom = $nom;
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
}