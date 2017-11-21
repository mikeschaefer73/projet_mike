<?php


// inclusion du controller
require_once(dirname(__FILE__) . "/app/Controller/Controller.php");


//Récupere l'URL
$url = parse_url($_SERVER['REQUEST_URI']);
$path = explode("/", $url['path']);

$route = $path[2];

// j'instancie mon controller
$controller = new Controller();
if ($route === "" || !isset($path[2])){
    // TESTE CHAINE DE REQUETTE
    $controller->home();//on demande  à afficher les  articles
} elseif ($route === "detail" && isset($_GET['article']) AND !empty($_GET['article']) AND (int)$_GET['article'] > 0) {
    $controller->detail((int)$_GET['article']);// article trouvé !
}
elseif ($route === "connection") {
    $controller->identify($_POST['pseudo'] ,$_POST['pass'] );
} elseif ($route === 'save_article'){
    $controller->newArticle();
} elseif ($route === 'update_articles.phtml'){
        $controller->articleModification();
} else {
    var_dump("Page Introuvable");
    die;
}

