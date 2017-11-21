<?php
require_once(dirname(__FILE__) . '/../Model/ArticleManager.php');

require_once(dirname(__FILE__) . '/../Model/AdminManager.php');


class Controller                 // Controller d'appel au fonction
{
    public function home()
    {  // point entrée .
        $articleManager = new ArticleManager;
        $articles = $articleManager->findAll();

        // var_dump($articles); die;
        require(dirname(__FILE__) . '/../view/accueil.phtml');
    }

    public function detail($id)
    {
        $articleManager = new ArticleManager;
        $article = $articleManager->find($id);
        if (!$article) {
            echo 'ERREUR ! Article inconnu !';
            die;
        }
        require(dirname(__FILE__) . '/../view/detail.phtml');

    }


    public function identify($pseudo , $pass)
    {
        $adminManager = new AdminManager;
       if ($adminManager->checkPassword($pseudo, $pass)){
           $this->Listing_article();

       }


    }

    public function articleModification($id)
    {
        $articleManager = new ArticleManager;
        $articles = $articleManager->update_articles($id);
        require_once(dirname(__FILE__) . '/../view/article-modification.php');


    }

    public function newArticle()
    {
        $articleManager = new ArticleManager;
        $articles = $articleManager->insert();
        require_once(dirname(__FILE__) . '/../view/article-creation.php');


    }

    public function delete()
    {
        $articleManager = new ArticleManager;
        $article = $articleManager->delete_Article();
    }

    public function Listing_article()
    {
        $articleManager = new ArticleManager;
        $articles = $articleManager->findAll();
        require_once(dirname(__FILE__) . '/../view/admin.phtml');
    }










}

