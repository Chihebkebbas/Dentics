<?php
namespace Dentics\Classe;

abstract class Utilisateur {
    protected ?int $id;
    protected string $nom;
    protected string $email;
    protected string $mot_de_passe;
    protected string $role;

    public function __construct(string $nom, string $email, string $mot_de_passe, string $role) {
        $this->nom = $nom;
        $this->email = $email;
        $this->mot_de_passe = password_hash($mot_de_passe, PASSWORD_BCRYPT);
        $this->role = $role;
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function getNom(): string {
        return $this->nom;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getMotDePasse(): string {
        return $this->mot_de_passe;
    }

    public function getRole(): string {
        return $this->role;
    }

    public function setNom(string $nom) {
        $this->nom = $nom;
    }

    public function setMotDePasse(string $mot_de_passe) {
        $this->mot_de_passe = password_hash($mot_de_passe, PASSWORD_BCRYPT);
    }

    public function setEmail(string $email) {
        $this->email = $email;
    }

}