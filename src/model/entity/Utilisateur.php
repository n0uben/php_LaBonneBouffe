<?php

class Utilisateur
{
    private int $id;
    private string $email;
    private string $mdp;
    private string $nom;
    private string $role;

    /**
     * @param string $email
     * @param string $mdp
     * @param string $nom
     * @param string $role
     */
    public function __construct(string $email=null, string $mdp=null, string $nom=null, string $role=null)
    {
        if ($email !== null) {$this->email = $email;}
        if ($mdp !== null) {$this->mdp = $mdp;}
        if ($nom !== null) {$this->nom = $nom;}
        if ($role !== null) {$this->role = $role;}
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
     * @param string  $email
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
     * @param string  $mdp
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
     * @param string  $nom
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
     * @param string  $role
     */
    public function setRole(string $role): void
    {
        $this->role = $role;
    }

}