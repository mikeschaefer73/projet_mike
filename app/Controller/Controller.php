<?php
require_once(dirname(__FILE__) . '/../Model/ArticleManager.php');

require_once(dirname(__FILE__) . '/../Model/AdminManager.phtml');


class Controller                 // Controller d'appel au fonction
{
    public function home()
    {  // point entrée .
        $articleManager = new ArticleManager;
        $articles = $articleManager->findAll();

        // var_dump($articles); die;
        require(dirname(__FILE__) . '/../Vue/accueil.phtml');
    }

    public function detail($id)
    {
        $articleManager = new ArticleManager;
        $article = $articleManager->find($id);
        if (!$article) {
            echo 'ERREUR ! Article inconnu !';
            die;
        }
        require(dirname(__FILE__) . '/../Vue/detail.phtml');

    }


    public function identify()
    {
        $adminManager = new AdminManager;
        $adminManager->checkPassword();
        require_once(dirname(__FILE__) . '/../Vue/article-creation.php');
    }

    public function articleModification($id)
    {
        $articleManager = new ArticleManager;
        $articles = $articleManager->update_articles($id);
        require_once(dirname(__FILE__) . '/../Vue/article-modification.php');


    }

    public function newArticle()
    {
        $articleManager = new ArticleManager;
        $articles = $articleManager->insert();
        require_once(dirname(__FILE__) . '/../Vue/article-creation.php');


    }

    public function delete()
    {
        $articleManager = new ArticleManager;
        $article = $articleManager->delete_Article();
    }










}

