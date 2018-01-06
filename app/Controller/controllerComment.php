<?php
require_once(dirname(__FILE__) . '/../Model/ArticleManager.php');

require_once(dirname(__FILE__) . '/../Model/AdminManager.php');

require_once(dirname(__FILE__) . '/../Model/CommentManager.php');





class controllerComment extends ControllerArticle
{
    public function newComment($pseudo, $content, $id_article)
    {
        $commentManager = new CommentManager;
        if (!empty($_POST) && $_POST['pseudo'] && $_POST['content'] && $_POST['id_article'] && !empty($_POST['pseudo']) && !empty($_POST['content']) && !empty($_POST['id_article'])) {

            $comment = $commentManager->insertComment($pseudo, $content, $id_article);
            unset($_POST);
        } else {
            echo 'veiller a remplir tous les champs !';
            die;
        }
        $comment = parent::detail($id_article);
    }

    public function delete_CommentAdmin($id)
    {
        $commentManager = new CommentManager;
        $comment = $commentManager->deleteComment($id);
        $this->Listing_article();
    }

    public function signal($idcommentaire)
    {
        $commentManager = new commentManager;
        $flag = $commentManager->flag($idcommentaire);
        $comment = $commentManager->find($idcommentaire);
        parent::detail($comment['id_article']);
    }

    public function page_connect()                  // function pour afficher page connection.
    {
        include("./app/view/connect.phtml");
    }


    public function button_only_comment()              // function pour bouton commentaires dans page admin .
    {
        $commentManager = new CommentManager;
        $comments = $commentManager->findAll();
        require_once(dirname(__FILE__) . '/../view/commentaires.phtml');
    }


}

