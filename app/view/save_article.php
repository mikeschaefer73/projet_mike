<?php

if (!isset($_SESSION)) {
    session_start();
}


require dirname(__FILE__).'/../Model/ArticleManager.php';   // appel a la fonction insert seulement si connecter
if ($_SESSION == true){
$articleManager = new ArticleManager();
$articleManager->insert($param_arr);
}