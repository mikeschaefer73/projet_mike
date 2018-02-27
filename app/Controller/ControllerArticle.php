<?php
require_once(dirname(__FILE__) . '/../Model/ArticleManager.php');

require_once(dirname(__FILE__) . '/../Model/AdminManager.php');

require_once(dirname(__FILE__) . '/../Model/CommentManager.php');


class ControllerArticle                                       // ControllerArticle d'appel au fonction pour les articles
{

    protected $articleManager;

    public function __construct()                            //  construct  pour instancier  articleManager
    {
        $this->articleManager = new ArticleManager();
    }


    public function home()                                   // point entrée .
    {
        $articles = $this->articleManager->findAll();
        require(dirname(__FILE__) . '/../view/accueil.phtml');
    }


    public function detail($id)                               // affiche detail des articles
    {
        $article = $this->articleManager->find($id);
        if (!$article) {
            echo 'ERREUR ! Article inconnu !';
            die;
        }
        $comments = $this->articleManager->findAllComment($id);     // affiche detail des commentaire
        require(dirname(__FILE__) . '/../view/detail.phtml');

    }


    public function identify()
    {
        if (!empty($_POST['pseudo']) && !empty($_POST['pass'])) {
            $adminManager = new AdminManager;
            $check_pass = $adminManager->checkPassword($_POST['pseudo'], $_POST['pass']);
        }
        if ($check_pass != null && $_POST != null && $check_pass['pass'] == $_POST['pass']) {
            $_SESSION['is_admin'] = true;
            $this->Listing_article();

        } else {
            include(dirname(__FILE__) . '/../view/erreur-login.phtml');
        }
    }

    public function articleModification()
    {
        $article = $this->articleManager->update_articles($_POST['id'], $_POST['title'], $_POST['content']);
        $this->Listing_article();
    }

    public function newArticle($param_arr)
    {

        if (!empty($param_arr) && $param_arr['post']['title'] && $param_arr['post']['content'] && $param_arr['post']['author']) {
            $articles = $this->articleManager->insert($param_arr);

        }

        require_once(dirname(__FILE__) . '/../view/article-creation.php');


    }

    public function delete($id)
    {

        $article = $this->articleManager->delete_Article($id);
        $this->Listing_article();
    }

    public function Listing_article()
    {
        $articleManager = new ArticleManager;
        $articles = $articleManager->findAll();
        $commentManager = new CommentManager;
        $comments = $commentManager->findAll();
        require_once(dirname(__FILE__) . '/../view/admin.phtml');
    }


    public function edit($id)              // affiche l'article a modifier .
    {

        $article = $this->articleManager->find($id);

        if (!$article) {
            echo 'ERREUR ! id inconnu !';
            die;
        }
        require_once(dirname(__FILE__) . '/../view/article-modification.php');
    }

    public function only_article()          // function pour bouton articles dans page admin .
    {
        $articles = $this->articleManager->findAll();
        require_once(dirname(__FILE__) . '/../view/articles.phtml');
    }

}
