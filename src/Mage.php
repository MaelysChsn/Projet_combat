<?php

class Mage extends personnage
{


    // private $cible;
    //
    // public function endormir(){
    //
    //     $cible->sleep(15);
    //
    // }

    public function __construct(string $nom){

        $this->nom = $nom;
        $this->setVie(100);
        $this->setAttaque(rand(5,10));
        $this->setDefense(0);

    }

}
