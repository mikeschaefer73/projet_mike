<?php


// inclusion des controllers
require_once(dirname(__FILE__) . "/app/Controller/ControllerArticle.php");
require_once(dirname(__FILE__) . "/app/Controller/controllerComment.php");

class Routing extends ControllerArticle
{
    protected $ControllerArticle;
    protected $controllerComment;
    protected $route;
    protected $url;
    protected $path;

    public function __construct()
    {
        $this->ControllerArticle = new ControllerArticle();
        $this->controllerComment = new controllerComment();
        //Récupere l'URL
        $this->url = parse_url($_SERVER['REQUEST_URI']);

        $this->path = explode("/", $this->url['path']);


        $this->route = $this->path[2];
    }

    function routing()
    {

        if ($this->route == '' || $this->route == 'home') {
            $this->ControllerArticle->home();
            return;
        }
        if ($this->route == 'logout') {

            session_destroy();
            header('Location: home');
            return;

        }
        if ($this->route == 'newPassword'){
            $this->ControllerArticle->newPassword();
            return;
        }
        if ($this->route == 'return_admin' && $_SESSION == true) {
            $this->ControllerArticle->listingArticle();
            return;
        }
        if ($this->route == 'return_admin' && !$_SESSION == true) {         // verification si admin connecter //
            $this->controllerComment->pageConnect();
            return;
        } elseif (method_exists($this->ControllerArticle, $this->route)) {

            $param_arr = [];
            if ($_POST) {
                $param_arr['post'] = $_POST;
            }
            if ($_GET) {
                $param_arr['get'] = $_GET;
            }

            call_user_func(array($this->ControllerArticle, $this->route), $param_arr);


        } elseif (method_exists($this->controllerComment, $this->route)) {

            $param_arr = [];
            if ($_POST) {
                $param_arr['post'] = $_POST;
            }
            if ($_GET) {
                $param_arr['get'] = $_GET;
            }
            if ($this->route == 'newComment') {
                $content = htmlspecialchars($_POST['content']);
                $this->controllerComment->newComment($_POST['pseudo'], $content, $_POST['id_article']);
            } else {
                call_user_func(array($this->controllerComment, $this->route), $param_arr);
            }


        } else {
            include("./app/view/404.php");
            http_response_code(404);
            return;

        }

    }


}





