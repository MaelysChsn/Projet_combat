<?php

abstract class Personnage
{
 public string $nom;
 public int $vie;
 public int $attaque;
 public int $defense;
 public bool $endormis;
 public DateTime $dateDormis;

public function dors($dateDormis){
    $dateReveil = new DateTime();
    if ($dateDormis > $dateReveil){
        $endormis = true;
    }
    else{
        $endormis = false;
    }
    return $endormis;

}





 public function attaquer(Personnage $cible, $endormis): void
 {
     if($endormis == false) {
         $degats = $cible->getVie() - ($this->getAttaque() - $cible->getDefense());

         if ($degats > $cible->getVie()) {
             return;
         }

         $cible->setVie($degats);
     }
     else{
         $message = "vous dormez";
     }
 }



 public function __construct($nom, $vie, $attaque, $defense, $endormis, $dateDormis, $cible){

     $this->nom = $nom;
     $this->vie = $vie;
     $this->attaque = $attaque;
     $this->defense = $defense;
     $this->dors($endormis);
     $this->attaquer();


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
     * @return bool
     */
    public function isEndormis(): bool
    {
        return $this->endormis;
    }

    /**
     * @param bool $endormis
     */
    public function setEndormis(bool $endormis): void
    {
        $this->endormis = $endormis;
    }

    /**
     * @return DateTime
     */
    public function getDateDormis(): DateTime
    {
        return $this->dateDormis;
    }

    /**
     * @param DateTime $dateDormis
     */
    public function setDateDormis(DateTime $dateDormis): void
    {
        $this->dateDormis = $dateDormis;
    }

}
