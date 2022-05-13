<?php

class Utilisateur
{
    private int $id;
    private string $email;
    private string $mdp;
    private string $nom;
    private string $role;

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
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getMdp(): string
    {
        return $this->mdp;
    }

    /**
     * @param string $mdp
     */
    public function setMdp(string $mdp): void
    {
        $this->mdp = $mdp;
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
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * @param string $role
     */
    public function setRole(string $role): void
    {
        $this->role = $role;
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

            $values .= '"' . $value . '"';
            if ($value !== $lastValue) {
                $values .= ', ';
            }
        }
        $values .= ')';

        return $values;
    }

    // Kevin : ajout de hydrate pour pouvoir utiliser la pmethode get dans UtilisateurController

    public function hydrate(array $donnees){
        foreach ($donnees as $key => $value){
            $method = 'set'.ucfirst($key);
            if(method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }
}