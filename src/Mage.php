<?php

class Mage extends Personnage
{

    private $canspell;

    public function endormir(Personnage $cible):void{

        $cible->setEndormis(true);

    }

    public function __construct(string $nom){

        $this->nom = $nom;
        $this->setVie(100);
        $this->setAttaque(rand(5,10));
        $this->setDefense(0);
        //$this->endormir();


    }

}
