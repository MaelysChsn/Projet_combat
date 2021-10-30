<?php

abstract class personnage
{
 public string $nom;
 public int $vie;
 public int $attaque;
 public int $defense;
 public int $duree;



 public function attaquer(personnage $cible): void
 {
    $degats = $cible->getVie() - ($this->getAttaque() - $cible->getDefense());

    if ($degats > $cible->getVie()){
        return;
    }

    $cible->setVie($degats);

 }


 public function __construct($nom, $vie, $attaque, $defense, $cible, int $duree){

     $this->nom = $nom;
     $this->vie = $vie;
     $this->attaque = $attaque;
     $this->defense = $defense;
     $this->attaquer($cible);
     $this->duree = $duree;
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
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getVie()
    {
        return $this->vie;
    }

    /**
     * @param mixed $vie
     */
    public function setVie($vie): void
    {
        $this->vie = $vie;
    }

    /**
     * @return mixed
     */
    public function getAttaque()
    {
        return $this->attaque;
    }

    /**
     * @param mixed $attaque
     */
    public function setAttaque($attaque): void
    {
        $this->attaque = $attaque;
    }

    /**
     * @return mixed
     */
    public function getDefense()
    {
        return $this->defense;
    }

    /**
     * @param mixed $defense
     */
    public function setDefense($defense): void
    {
        $this->defense = $defense;
    }

    /**
     * @return int
     */
    public function getDuree(): int
    {
        return $this->duree;
    }

    /**
     * @param int $duree
     */
    public function setDuree(int $duree): void
    {
        $this->duree = $duree;
    }

}
