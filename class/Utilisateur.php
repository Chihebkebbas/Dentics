<?php

namespace Dentics\Classe;

abstract class Utilisateur {
    
    protected int $id;
    protected string $nom;
    protected string $email;
    protected string $motDePasse;


    public function __construct(string $nom, string $email, string $motDePasse) {
        $this->nom = $nom;
        $this->email = $email;
        $this->motDePasse = $motDePasse;
    }

    public function __get($attribut) {
        return $this->$attribut;
    }

    public function __set($attribut, $valeur) {
        $this->$attribut = $valeur;
    }

    public function __toString() {
        return "Utilisateur : " . $this->nom . " (" . $this->email . ")";
    }

}