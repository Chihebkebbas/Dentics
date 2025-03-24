<?php
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