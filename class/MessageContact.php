<?php
namespace Dentics\Classe;

class MessageContact
{
    private ?int $id_message;
    private string $nom;
    private string $email;
    private string $message;
    private string $date_envoi;  // Date au format "YYYY-MM-DD"
    private string $heure_envoi; // Heure au format "HH:MM:SS"

    public function __construct(
        string $nom,
        string $email,
        string $message,
        string $date_envoi,
        string $heure_envoi
    ) {
        $this->id_message = null; 
        $this->nom        = $nom;
        $this->email      = $email;
        $this->message    = $message;
        $this->date_envoi = $date_envoi;
        $this->heure_envoi= $heure_envoi;
    }

    // --- GETTERS ---
    public function getIdMessage(): ?int   { return $this->id_message; }
    public function getNom(): string      { return $this->nom; }
    public function getEmail(): string    { return $this->email; }
    public function getMessage(): string  { return $this->message; }
    public function getDateEnvoi(): string{ return $this->date_envoi; }
    public function getHeureEnvoi(): string { return $this->heure_envoi; }

    // --- SETTERS ---
    public function setIdMessage(int $id): void {
        $this->id_message = $id;
    }
}
