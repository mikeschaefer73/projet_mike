<?php
session_start();


require dirname(__FILE__).'/../Model/ArticleManager.php';   // appel a la fonction insert seulement si connecter
$articleManager = new ArticleManager();
$articleManager->insert();