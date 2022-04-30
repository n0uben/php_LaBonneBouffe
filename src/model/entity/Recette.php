<?php

class Recette
{
    private $id;
    private $nom;
    private $categorie;
    private $niveau;
    private $tpsPrepa;
    private $tpsCuisson;
    private $budget;
    private $nbPers;
    private $etapes;
    private $utilisateurID;

    /**
     * @param $nom
     * @param $categorie
     * @param $niveau
     * @param $tpsPrepa
     * @param $tpsCuisson
     * @param $budget
     * @param $nbPers
     * @param $etapes
     * @param $utilisateurID
     */
    public function __construct($nom, $categorie, $niveau, $tpsPrepa, $tpsCuisson, $budget, $nbPers, $etapes, $utilisateurID)
    {
        $this->nom = $nom;
        $this->categorie = $categorie;
        $this->niveau = $niveau;
        $this->tpsPrepa = $tpsPrepa;
        $this->tpsCuisson = $tpsCuisson;
        $this->budget = $budget;
        $this->nbPers = $nbPers;
        $this->etapes = $etapes;
        $this->utilisateurID = $utilisateurID;
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
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @param mixed $categorie
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    }

    /**
     * @return mixed
     */
    public function getNiveau()
    {
        return $this->niveau;
    }

    /**
     * @param mixed $niveau
     */
    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;
    }

    /**
     * @return mixed
     */
    public function getTpsPrepa()
    {
        return $this->tpsPrepa;
    }

    /**
     * @param mixed $tpsPrepa
     */
    public function setTpsPrepa($tpsPrepa)
    {
        $this->tpsPrepa = $tpsPrepa;
    }

    /**
     * @return mixed
     */
    public function getTpsCuisson()
    {
        return $this->tpsCuisson;
    }

    /**
     * @param mixed $tpsCuisson
     */
    public function setTpsCuisson($tpsCuisson)
    {
        $this->tpsCuisson = $tpsCuisson;
    }

    /**
     * @return mixed
     */
    public function getBudget()
    {
        return $this->budget;
    }

    /**
     * @param mixed $budget
     */
    public function setBudget($budget)
    {
        $this->budget = $budget;
    }

    /**
     * @return mixed
     */
    public function getNbPers()
    {
        return $this->nbPers;
    }

    /**
     * @param mixed $nbPers
     */
    public function setNbPers($nbPers)
    {
        $this->nbPers = $nbPers;
    }

    /**
     * @return mixed
     */
    public function getEtapes()
    {
        return $this->etapes;
    }

    /**
     * @param mixed $etapes
     */
    public function setEtapes($etapes)
    {
        $this->etapes = $etapes;
    }

    /**
     * @return mixed
     */
    public function getUtilisateurID()
    {
        return $this->utilisateurID;
    }

    /**
     * @param mixed $utilisateurID
     */
    public function setUtilisateurID($utilisateurID)
    {
        $this->utilisateurID = $utilisateurID;
    }


}