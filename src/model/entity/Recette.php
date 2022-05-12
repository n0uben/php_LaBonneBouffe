<?php

class Recette
{
    private int $id;
    private string $nom;
    private string $categorie;
    private int $niveau;
    private int $tpsPrepa;
    private int $tpsCuisson;
    private string $budget;
    private int $nbPers;
    private string $etapes;
    private int $utilisateurID;

    /**
     * @param array|null $donnees
     */
    // CONSTRUCTEUR A REFACTORER AVEC ARRAY ET FOREACH
    public function __construct(array $donnees=null)
    {
        if ($donnees !== null) {
            foreach ($donnees as $key => $value){
                $method = 'set' .ucfirst($key);
                if(method_exists($this, $method)){
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
    public function getCategorie(): string
    {
        return $this->categorie;
    }

    /**
     * @param string $categorie
     */
    public function setCategorie(string $categorie): void
    {
        $this->categorie = $categorie;
    }

    /**
     * @return int
     */
    public function getNiveau(): int
    {
        return $this->niveau;
    }

    /**
     * @param int $niveau
     */
    public function setNiveau(int $niveau): void
    {
        $this->niveau = $niveau;
    }

    /**
     * @return int
     */
    public function getTpsPrepa(): int
    {
        return $this->tpsPrepa;
    }

    /**
     * @param int $tpsPrepa
     */
    public function setTpsPrepa(int $tpsPrepa): void
    {
        $this->tpsPrepa = $tpsPrepa;
    }

    /**
     * @return int
     */
    public function getTpsCuisson(): int
    {
        return $this->tpsCuisson;
    }

    /**
     * @param int $tpsCuisson
     */
    public function setTpsCuisson(int $tpsCuisson): void
    {
        $this->tpsCuisson = $tpsCuisson;
    }

    /**
     * @return string
     */
    public function getBudget(): string
    {
        return $this->budget;
    }

    /**
     * @param string $budget
     */
    public function setBudget(string $budget): void
    {
        $this->budget = $budget;
    }

    /**
     * @return int
     */
    public function getNbPers(): int
    {
        return $this->nbPers;
    }

    /**
     * @param int $nbPers
     */
    public function setNbPers(int $nbPers): void
    {
        $this->nbPers = $nbPers;
    }

    /**
     * @return string
     */
    public function getEtapes(): string
    {
        return $this->etapes;
    }

    /**
     * @param string $etapes
     */
    public function setEtapes(string $etapes): void
    {
        $this->etapes = $etapes;
    }

    /**
     * @return int
     */
    public function getUtilisateurID(): int
    {
        return $this->utilisateurID;
    }

    /**
     * @param int $utilisateurID
     */
    public function setUtilisateurID(int $utilisateurID): void
    {
        $this->utilisateurID = $utilisateurID;
    }

    /**
     * @return string
     */
    public function getKeysSQL(): string
    {
        $keys = '(';

        $lastValue = end($this);

        foreach ($this as $key => $value) {

            $keys .= $key;
            if ($value !== $lastValue) {
                $keys .= ', ';
            }
        }
        $keys .= ')';

        return $keys;
    }
    /**
     * @return string
     */
    public function getValuesSQL(): string
    {
        $values = '(';

        $lastValue = end($this);

        foreach ($this as $key => $value) {

            $values .= '"'.$value.'"';
            if ($value !== $lastValue) {
                $values .= ', ';
            }
        }
        $values .= ')';

        return $values;
    }


}