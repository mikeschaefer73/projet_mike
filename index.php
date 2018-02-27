<?php


require_once(dirname(__FILE__) . "/Routing.php");




$rouring = new routing;
$rouring->routing();





/*  Récupere l'URL
$url = parse_url($_SERVER['REQUEST_URI']);
$path = explode("/", $url['path']);

$route = $path[2];

// j'instancie mon controller
$ControllerArticle = new ControllerArticle();
$controllerComment = new controllerComment(); // */

/* if ($route === "" || !isset($route)){
    // TESTE CHAINE DE REQUETTE
    $ControllerArticle->home();//on demande  à afficher les  articles
} elseif ($route === "detail" && isset($_GET['article']) AND !empty($_GET['article']) AND (int)$_GET['article'] > 0) {
    $ControllerArticle->detail((int)$_GET['article']);  // article trouvé !
}
elseif ($route === "connection") {
    $ControllerArticle->identify($_POST['pseudo'] ,$_POST['pass'] );

} elseif ($route === 'save_article'){
    $ControllerArticle->newArticle();

} elseif ($route === 'update_articles'){
    $ControllerArticle->articleModification($_POST['id'] ,$_POST['title'] ,$_POST['content'] );

} elseif ($route == "modification" && isset($_GET['article']) AND !empty($_GET['article']) AND (int)$_GET['article'] > 0) {
    $ControllerArticle->edit((int)$_GET['article']);

} elseif ($route == 'delete_Billet'){
    $ControllerArticle->delete($_GET['article']);

} elseif ($route == 'return_admin' && $_SESSION == true){
    $ControllerArticle->Listing_article();

} elseif ($route == 'return_admin' && !$_SESSION == true){         // verification si admin connecter //
    $controllerComment->page_connect();

} elseif ($route == 'save_comment'){
    $controllerComment->newComment($_POST['pseudo'], $_POST['content'], $_POST['id_article']);

} elseif ($route == 'delete_commentaire'){
    $controllerComment->delete_CommentAdmin($_GET['comment']);

} elseif ($route == 'signaler'){
    $controllerComment->signal($_GET['id']);

} elseif ($route == 'connect_page'){
    $controllerComment->page_connect();

} elseif ($route == 'only_article'){
    $ControllerArticle->buton_only_article();
} elseif ($route =='only_comment'){
    $controllerComment->button_only_comment();
}
elseif ($route == 'logout'){
    session_destroy();
    header('location: /index.php/');
    exit;
}
else {
    include("./app/view/404.phtml");
    http_response_code(404);
    die;
} */



