<?php 

namespace Dentics\Classe;

class Client extends Utilisateur {

    private ?string $photo;

    public function __construct(string $nom, string $email, string $motDePasse, ?string $photo = null) {
        parent::__construct($nom, $email, $motDePasse);
        $this->photo = $photo;
    }

    public function __setPhoto(string $linkPhoto) {
        $this->photo = $linkPhoto;
    }

    public function __getPhoto() {
        return $this->photo;
    }

    public function modifierProfil(string $nom, string $email, ?string $photo = null) {
        $this->nom = $nom;
        $this->email = $email;
        if ($photo) {
            $this->photo = $photo;
        }
    }

    public function modifierMotDePasse(string $updatedMotdePasse) {
        $this->motDePasse = $updatedMotdePasse;
    }

}