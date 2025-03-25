<?php
namespace Dentics\Classe;

class RendezVous
{
    private ?int $id_rdv;
    private string $nom;
    private string $email;
    private string $telephone;
    private int $id_dentist;   // ou un identifiant du dentiste
    private string $date_rdv;  // ex: "12-oct-2024"
    private string $heure_rdv; // ex: "09:00"
    private string $statut;    // "en attente" par défaut

    /**
     * Constructeur
     */
    public function __construct(
        string $nom,
        string $email,
        string $telephone,
        int $id_dentist,
        string $date_rdv,
        string $heure_rdv,
        string $statut = "en attente"
    ) {
        $this->id_rdv     = null; // sera affecté après insertion
        $this->nom        = $nom;
        $this->email      = $email;
        $this->telephone  = $telephone;
        $this->id_dentist = $id_dentist;
        $this->date_rdv   = $date_rdv;
        $this->heure_rdv  = $heure_rdv;
        $this->statut     = $statut;
    }

    // GETTERS
    public function getIdRdv(): ?int       { return $this->id_rdv; }
    public function getNom(): string       { return $this->nom; }
    public function getEmail(): string     { return $this->email; }
    public function getTelephone(): string { return $this->telephone; }
    public function getIdDentist(): int    { return $this->id_dentist; }
    public function getDateRdv(): string   { return $this->date_rdv; }
    public function getHeureRdv(): string  { return $this->heure_rdv; }
    public function getStatut(): string    { return $this->statut; }

    // SETTERS
    public function setIdRdv(int $id_rdv): void { $this->id_rdv = $id_rdv; }
    public function setStatut(string $statut): void { $this->statut = $statut; }
}
