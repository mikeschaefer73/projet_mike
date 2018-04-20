<?php
require_once(dirname(__FILE__) . '/../Model/ArticleManager.php');

require_once(dirname(__FILE__) . '/../Model/AdminManager.php');

require_once(dirname(__FILE__) . '/../Model/CommentManager.php');


class ControllerArticle                                         // ControllerArticle d'appel au fonction pour les articles
{

    protected $articleManager;

    public function __construct()                              //  construct  pour instancier  articleManager
    {
        $this->articleManager = new ArticleManager();
    }


    public function home()                                    // point entrée .
    {
        $articles = $this->articleManager->findAll();
        require(dirname(__FILE__) . '/../view/accueil.php');
    }


    public function detail($id)                              // affiche detail des articles
    {
        $article = $this->articleManager->find($id);
        if (!$article) {

            require_once(dirname(__FILE__) . '/../view/404.php');
        }
        $comments = $this->articleManager->findAllComment($id);     // affiche detail des commentaires
        require(dirname(__FILE__) . '/../view/detail.php');

    }


    public function identify()
    {
        $passIsValid = false;
        if (!empty($_POST['pseudo']) && !empty($_POST['pass'])) {
            $adminManager = new AdminManager;
            $passIsValid = $adminManager->checkPassword($_POST['pseudo'], $_POST['pass']);
        }

        if ($passIsValid != false && $_POST != null && $passIsValid['pass'] == $_POST['pass']) {
            $_SESSION['is_admin'] = true;
            $this->ListingArticle();

        } else {
            $_SESSION['msg'] = 'Mauvais identifiant ou mot de pass ! !';
            include(dirname(__FILE__) . '/../view/connect.php');
        }
    }

    public function newPassword()
    {
            if (!empty($_POST['pseudo']) && (!empty($_POST['pass']))) {
            $adminManager = new AdminManager;
            $adminManager->changePassword($_POST['id'], $_POST['pseudo'],$_POST['pass']);

            } else {
                $_SESSION['msg'] = 'Tous les champs ne sont pas remplis';
            } include(dirname(__FILE__) . '/../view/parameter-admin.php');
    }                        // changement de mot de pass

    public function articleModification()
    {
        $article = $this->articleManager->updateArticles($_POST['id'], $_POST['title'], $_POST['content']);
        $this->ListingArticle();
    }              // update Articles

    public function newArticle($param_arr)
    {

        if (!empty($param_arr) && ($param_arr['post']['title'] && ($param_arr['post']['content'] && ($param_arr['post']['author'])))) {
            $articles = $this->articleManager->insert($param_arr);

        } else if (!empty($param_arr) && empty($param_arr['post']['title'] && empty($param_arr['post']['content'] && empty($param_arr['post']['author'])))){
            $_SESSION['msg'] = 'Tous les champs ne sont pas remplis';
            $title = $param_arr['post']['title'];
            $content = $param_arr['post']['content'];
            $author = $param_arr['post']['author'];
        } require_once(dirname(__FILE__) . '/../view/article-creation.php');
    }            // creation article

    public function delete($id)
    {

        $article = $this->articleManager->deleteArticle($id);
        $this->listingArticle();
    }                       // supresion article

    public function listingArticle()
    {
        $articleManager = new ArticleManager;
        $articles = $articleManager->findAll();
        $commentManager = new CommentManager;
        $comments = $commentManager->findAll();
        require_once(dirname(__FILE__) . '/../view/admin.php');
    }


    public function edit($id)                               // affiche l'article a modifier .
    {

        $article = $this->articleManager->find($id);

        if (!$article) {
            echo 'ERREUR ! id inconnu !';
            die;
        }
        require_once(dirname(__FILE__) . '/../view/article-modification.php');
    }

    public function onlyArticle()                         // function pour bouton articles dans page admin .
    {
        $articles = $this->articleManager->findAll();
        require_once(dirname(__FILE__) . '/../view/articles.php');
    }

}
