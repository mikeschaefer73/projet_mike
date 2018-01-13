<?php
require_once(dirname(__FILE__) . '/../Model/ArticleManager.php');

require_once(dirname(__FILE__) . '/../Model/AdminManager.php');

require_once(dirname(__FILE__) . '/../Model/CommentManager.php');


class ControllerArticle                 // ControllerArticle d'appel au fonction pour les articles //
{

    protected $articleManager;

    public function __construct()     //  construct  pour instancier  articleManager
    {
        $this->articleManager = new ArticleManager();
    }


    public function home()
    {  // point entrée .

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


    public function identify($pseudo, $pass)
    {
        $adminManager = new AdminManager;
        $check_pass = $adminManager->checkPassword($pseudo, $pass);

        if ($check_pass != null && $pass != null && $check_pass['pass'] == $pass) {
            $_SESSION['is_admin'] = true;
            $this->Listing_article();

        } else {
            include("./app/view/erreur-login.phtml");

        }

    }

    public function articleModification($id, $title, $content)
    {
        $article = $this->articleManager->update_articles($id, $title, $content);
        $this->Listing_article();
    }

    public function newArticle()
    {

        if (!empty($_POST) && $_POST['title'] && $_POST['content'] && $_POST['author'])
            $articles = $this->articleManager->insert();
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

    public function buton_only_article()          // function pour bouton articles dans page admin .
    {
        $articles = $this->articleManager->findAll();
        require_once(dirname(__FILE__) . '/../view/articles.phtml');
    }

}
