# 🦷 Dentics – Gestion de Rendez-Vous

## 📌 Description
**Dentics** est une application web permettant aux patients de prendre rendez-vous en ligne et aux administrateurs de gérer les utilisateurs, les rendez-vous et les disponibilités des dentistes.

- Les **patients** peuvent consulter les services, prendre rendez-vous, et gérer leur compte.
- Les **administrateurs** accèdent à un back-office sécurisé pour tout gérer.

🔗 Projet en ligne :  
https://pedago.univ-avignon.fr/~uapv2500228/

---

## 🚀 Fonctionnalités principales

### 🔹 Front Office *(développé par Chiheb Eddine KEBBAS)*
- Page d’accueil dynamique avec sections (services, à propos, contact)
- Formulaire de contact avec envoi d’email (PHPMailer)
- Connexion / Inscription
- Affichage d’informations personnelles (nom, email)
- Cookies personnalisés (bandeau d’acceptation + message de bienvenue)
- Protection CSRF sur tous les formulaires sensibles
- Intégration des URLs propres via **URL Rewriting (.htaccess)** (En cours ..)

### 🔹 Back Office *(Par Syphax MEDJBER)*
- Gestion des utilisateurs
- Gestion des rendez-vous
- Gestion des disponibilités

---

## 📁 Structure du projet

```
Dentics/
├── class/                  # Classes métier (Client, Utilisateur...)
├── control/                # Contrôleurs (logique des pages)
├── css/                    # Feuilles de style CSS
├── images/                 # Contenus visuels
├── js/                     # Scripts JavaScript
├── lib/                    # Librairies externes (PHPMailer)
├── model/                  # Modèles (accès BDD)
├── templates/front/        # Vues HTML du front office
├── utils/                  # Fonctions utilitaires (MailHelper)
├── .htaccess               # URL rewriting
├── index.php               # Point d’entrée principal du site (Login)
└── README.md               # Documentation client (ce fichier)
```

---

## 🛠️ Technologies utilisées

- **HTML5 / CSS3 / JavaScript** 
- **PHP 8** (procédural et orienté objet)
- **PostgreSQL** pour la base de données
- **PHPMailer** pour l’envoi de mails
- **Figma** pour la maquette graphique

---

## 🌐 Déploiement

Le projet est hébergé sur le serveur universitaire :  
https://pedago.univ-avignon.fr/~uapv2500228/

- URL rewriting configuré via `.htaccess` (En cours)
- Cookies fonctionnels
- Sessions utilisateurs actives

---

## 🌐 Mentions Légales et Conditions Générales d'Utilisation

### Mentions Légales
Ce site est un projet universitaire réalisé dans le cadre de la Licence Informatique à l’Université d’Avignon. Aucune donnée réelle n’est enregistrée ni exploitée à des fins commerciales. Tous les contenus sont simulés à des fins pédagogiques.

### Conditions Générales d'Utilisation (CGU)
L’utilisation du site Dentics est réservée à un usage scolaire. Les fonctionnalités de connexion, rendez-vous et messagerie sont simulées. Aucune exploitation commerciale ou collecte de données réelle n’est effectuée.

---

## 👤 Auteur

**Chiheb Eddine KEBBAS**  
Licence Informatique
Université d’Avignon  
Responsable de la partie **Front Office** du projet Dentics.

---

## 🌄 Licence

Projet sous [licence MIT](https://opensource.org/licenses/MIT) — Libre d’utilisation à des fins pédagogiques.

