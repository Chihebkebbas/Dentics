<?php

/**
 * Class Client
 *
 * Cette classe représente un client, qui est un type d'utilisateur dans le système.
 * Elle étend la classe Utilisateur et ajoute des propriétés et méthodes spécifiques aux clients.
 *
 * @package Dentics\Classe
 * @auteur     Chiheb Kebbas
 */

namespace Dentics\Classe;

class Client extends Utilisateur {
    private ?int $id_client;
    private ?string $photo;

    public function __construct(string $nom, string $email, string $mot_de_passe, ?string $photo = null) {
        parent::__construct($nom, $email, $mot_de_passe, "client");
        $this->photo = $photo;
    }

    public function getIdClient(): ?int {
        return $this->id_client;
    }

    public function getPhoto(): ?string {
        return $this->photo;
    }

    public function setPhoto(string $photo) {
        $this->photo = $photo;
    }

}