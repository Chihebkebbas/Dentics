<?php

namespace Dentics\Classe;

class Disponibilite
{

    private int $id_dispo;
    private int $id_dentist;
    private string $date_dispo;
    private string $heure_dispo;
    private bool $est_reserve;

    public function __construct(int $id_dispo, int $id_dentist, string  $date_dispo, string $heure_dispo, bool $est_reserve)
    {
        $this->id_dispo = $id_dispo;
        $this->id_dentist = $id_dentist;
        $this->date_dispo = $date_dispo;
        $this->heure_dispo = $heure_dispo;
        $this->est_reserve = $est_reserve;
    }

    public function __get($attribut)
    {
        return $this->attribut;
    }

    public function __set($attribut, $valeur)
    {
        $this->attribut = $valeur;
    }

    public function __toString()
    {
        return "Disponibilité de {$this->id_dentist} le {$this->date_dispo} à {$this->heure_dispo} est {$this->est_reserve}";
    }

}