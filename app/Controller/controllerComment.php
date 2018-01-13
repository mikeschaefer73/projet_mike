<?php
require_once(dirname(__FILE__) . '/../Model/ArticleManager.php');

require_once(dirname(__FILE__) . '/../Model/AdminManager.php');

require_once(dirname(__FILE__) . '/../Model/CommentManager.php');


class controllerComment extends ControllerArticle
{
    protected $commentManager;
    protected $controllerArticle;

    public function __construct()
    {
        $this->commentManager = new CommentManager();
        $this->controllerArticle = new ControllerArticle();

    }

    public function newComment($pseudo, $content, $id_article)  //  créer commentaire
    {

        if (!empty($_POST) && $_POST['pseudo'] && $_POST['content'] && $_POST['id_article'] && !empty($_POST['pseudo']) && !empty($_POST['content']) && !empty($_POST['id_article'])) {

            $comment = $this->commentManager->insertComment($pseudo, $content, $id_article);
            unset($_POST);
        } else {
            echo 'veiller a remplir tous les champs !';
            die;
        }
        
        $this->controllerArticle->detail($id_article);

    }

    public function delete_CommentAdmin($id)
    {

        $comment = $this->commentManager->deleteComment($id);
        $this->Listing_article();
    }

    public function signal($idcommentaire)
    {
        $flag = $this->commentManager->flag($idcommentaire);
        $comment = $this->commentManager->find($idcommentaire);
        $this->controllerArticle->detail($comment['id_article']);
    }

    public function page_connect()                  // function pour afficher page connection.
    {
        include("./app/view/connect.phtml");
    }


    public function button_only_comment()              // function pour bouton commentaires dans page admin .
    {

        $comments = $this->commentManager->findAll();
        require_once(dirname(__FILE__) . '/../view/commentaires.phtml');
    }


}

