<?php
session_start();

if(!isset($_SESSION['is_admin']) or $_SESSION['is_admin'] !== true){     // verification admin l'or de la connexion
    exit('Vous devez être deconnecté !');
}

require dirname(__FILE__).'/../Model/ArticleManager.php';   // appel a la fonction insert seulement si connecter
$articleManager = new ArticleManager();
$articleManager->insert();