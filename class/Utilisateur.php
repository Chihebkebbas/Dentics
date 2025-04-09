<?php

/**
 * Classe abstraite représentant un utilisateur.
 *
 * @package Dentics\Classe
 * @auteur     Chiheb Kebbas
 * 
 * @property int|null $id L'identifiant unique de l'utilisateur.
 * @property string $nom Le nom de l'utilisateur.
 * @property string $email L'adresse email de l'utilisateur.
 * @property string $mot_de_passe Le mot de passe de l'utilisateur (haché).
 * @property string $role Le rôle de l'utilisateur.
 * 
 * @method int|null getId() Récupère l'identifiant de l'utilisateur.
 * @method string getNom() Récupère le nom de l'utilisateur.
 * @method string getEmail() Récupère l'email de l'utilisateur.
 * @method string getMotDePasse() Récupère le mot de passe haché de l'utilisateur.
 * @method string getRole() Récupère le rôle de l'utilisateur.
 * @method void setNom(string $nom) Définit le nom de l'utilisateur.
 * @method void setMotDePasse(string $mot_de_passe) Définit et hache le mot de passe de l'utilisateur.
 * @method void setEmail(string $email) Définit l'email de l'utilisateur.
 */

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