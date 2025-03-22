<?php 

namespace Dentics\Classe;

class RendezVous {

    private int $id_rdv;
    private string $nom;
    private string $email;
    private string $telephone;
    private int $id_dentist;
    private string $date_rdv;
    private string $heure_rdv;
    private string $statue;


    public function __construct(int $id_rdv, string $nom, string $email, string $telephone, int $id_dentist, string $date_rdv, string $heure_rdv, string $statue) {
        $this->id_rdv = $id_rdv;
        $this->nom = $nom;
        $this->email = $email;
        $this->telephone = $telephone;
        $this->id_dentist = $id_dentist;
        $this->date_rdv = $date_rdv;
        $this->heure_rdv = $heure_rdv;
        $this->statue = $statue;
    }

    public function __get($attribut) {
        return $this->attribut;
    }

    public function __set($attribut, $valeur) {
        $this->attribut = $valeur;
    }

    public function __toString() {
        return "Rendez-vous de {$this->nom} avec Dentist n°{$this->id_dentist} le {$this->date_rdv} à {$this->heure_rdv} est {$this->statue}";
    }

}