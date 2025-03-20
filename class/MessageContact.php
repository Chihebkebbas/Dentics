<?php 

namespace Dentics\Classe;

class MessageContact {

    private int $id_message;
    private string $nom;
    private string $email;
    private string $message;
    private string $date_envoi;
    private string $heure_envoi;

    public function __construct(string $nom, string $email, string $message, string $date_envoi, string $heure_envoi) {
        $this->nom = $nom;
        $this->email = $email;
        $this->message = $message;
        $this->date_envoi = $date_envoi;
        $this->heure_envoi = $heure_envoi;
    }

    public function __get($attribut) {
        return $this->$attribut;
    }

    public function __set($attribut, $valeur) {
        $this->$attribut = $valeur;
    }

    public function __toString() {
        return "Message de {$this->nom} ({$this->email}) le {€this->date_envoi} à {$this->heure_envoi}: {$this->message}";
    }

}