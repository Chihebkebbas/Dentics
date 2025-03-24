<?php 

namespace Dentics\Classe;

class Client extends Utilisateur {

    protected ?string $photo;

    public function __construct(string $nom, string $email, string $motDePasse, ?string $photo = null) {
        parent::__construct($nom, $email, $motDePasse);
        $this->photo = $photo;
    }

    public function setPhoto(?string $linkPhoto) {
        $this->photo = $linkPhoto;
    }

    public function getPhoto() : ?string {
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
        $this->motDePasse = password_hash($updatedMotdePasse, PASSWORD_DEFAULT);
    }

}
