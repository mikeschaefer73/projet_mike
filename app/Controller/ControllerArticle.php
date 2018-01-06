<?php
require_once(dirname(__FILE__) . '/../Model/ArticleManager.php');

require_once(dirname(__FILE__) . '/../Model/AdminManager.php');

require_once(dirname(__FILE__) . '/../Model/CommentManager.php');


class ControllerArticle                 // ControllerArticle d'appel au fonction pour les articles //
{
    public function home()
    {  // point entrée .
        $articleManager = new ArticleManager;
        $articles = $articleManager->findAll();

        // var_dump($articles); die;
        require(dirname(__FILE__) . '/../view/accueil.phtml');
    }


    public function detail($id)                               // affiche detail des articles
    {
        $articleManager = new ArticleManager;
        $article = $articleManager->find($id);
        if (!$article) {
            echo 'ERREUR ! Article inconnu !';
            die;
        }
        $comments = $articleManager->findAllComment($id);     // affiche detail des commentaire
        require(dirname(__FILE__) . '/../view/detail.phtml');


    }


    public function identify($pseudo, $pass)
    {
        $adminManager = new AdminManager;
        $check_pass = $adminManager->checkPassword($pseudo, $pass);

        if ($check_pass != null && $pass != null && $check_pass['pass'] == $pass){
            $_SESSION['is_admin'] = true;
            $this->Listing_article();



        } else {
            include("./app/view/erreur-login.phtml");


        }

    }

    public function articleModification($id, $title, $content)
    {
        $articleManager = new ArticleManager;
        $article = $articleManager->update_articles($id, $title, $content);
        $this->Listing_article();


    }

    public function newArticle()
    {
        $articleManager = new ArticleManager;
        if (!empty($_POST) && $_POST['title'] && $_POST['content'] && $_POST['author'])
            $articles = $articleManager->insert();
        require_once(dirname(__FILE__) . '/../view/article-creation.php');


    }

    public function delete($id)
    {
        $articleManager = new ArticleManager;
        $article = $articleManager->delete_Article($id);
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


    public function edit($id)
    {
        $articleManager = new ArticleManager;
        $article = $articleManager->find($id);
        if (!$article) {
            echo 'ERREUR ! id inconnu !';
            die;
        }

        require_once(dirname(__FILE__) . '/../view/article-modification.php');
    }

    public function buton_only_article()          // function pour bouton articles dans page admin .
    {
        $articleManager = new ArticleManager;
        $articles = $articleManager->findAll();
        require_once(dirname(__FILE__) . '/../view/articles.phtml');
    }



}

         // fin du ControllerArticle d'appel au fonction pour les articles //
