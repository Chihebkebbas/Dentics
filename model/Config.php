<?php

/**
 * Configuration pour la connexion à la base de données.
 *
 * Ce script configure les variables nécessaires pour se connecter à une base de données PostgreSQL.
 * Il détermine dynamiquement l'hôte en fonction du nom du serveur et spécifie le nom de la base
 * de données, le nom d'utilisateur, le mot de passe, le port et le schéma à utiliser.
 *
 * Variables :
 * - $host : Le nom d'hôte du serveur de base de données. Il bascule entre deux valeurs selon
 *           que le serveur fonctionne localement ou non.
 * - $dbname : Le nom de la base de données à laquelle se connecter.
 * - $username : Le nom d'utilisateur pour l'authentification à la base de données.
 * - $chiheb : Une option de mot de passe pour un utilisateur spécifique (Chiheb).
 * - $syphax : Une option de mot de passe pour un utilisateur spécifique (Syphax).
 * - $password : Le mot de passe utilisé pour l'authentification, défini par défaut sur le mot de passe de Syphax.
 * - $port : Le numéro de port pour la connexion à la base de données.
 * - $schema : Le schéma à utiliser dans la base de données, défini par défaut sur le schéma de Syphax.
 */

$host = ($_SERVER['SERVER_NAME'] == 'localhost') ? 'pedago.univ-avignon.fr' : 'pedago01c.univ-avignon.fr';
$dbname = 'etd';
$username = 'uapv2500230';
//$username = 'uapv2500228';

$chiheb = 'PHKanA';
$syphax = 'f23WdW';

$password = $syphax;

$port = 5432;



//$schema = 'uapv2500228'; // schema de chiheb

$schema = 'uapv2500230'; // schema de syphaxe
