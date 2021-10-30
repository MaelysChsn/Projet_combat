<?php

class Guerrier extends Personnage
{

    public function __construct(string $nom){

        $this->nom = $nom;
        $this->setVie(100);
        $this->setAttaque(rand(20,40));
        $this->setDefense(rand(10,19));

    }
}
