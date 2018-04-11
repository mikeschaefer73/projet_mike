<?php
require_once(dirname(__FILE__) . '/../Model/ArticleManager.php');

require_once(dirname(__FILE__) . '/../Model/AdminManager.php');

require_once(dirname(__FILE__) . '/../Model/CommentManager.php');


class ControllerComment extends ControllerArticle
{
    protected $commentManager;
    protected $controllerArticle;

    public function __construct()
    {
        $this->commentManager = new CommentManager();
        $this->controllerArticle = new ControllerArticle();

    }

    public function newComment($pseudo, $content, $id_article)            //  créer commentaire
    {
        $id_article = intval($_POST['id_article']);

        if (!empty($_POST) && $_POST['pseudo'] && $_POST['content'] && $_POST['id_article'] && !empty($_POST['pseudo']) && !empty($_POST['content']) && !empty($_POST['id_article'])) {

            $comment = $this->commentManager->insertComment($pseudo, $content, $id_article);

            unset($_POST);
            $_SESSION['msg'] = 'Commentaire enregistré avec succès ! !';
        } else {
            $_SESSION['msg'] = 'Veuillez remplir tous les champs !';


        }
        $this->controllerArticle->detail($id_article);

    }

    public function deleteCommentAdmin($id)
    {

        $comment = $this->commentManager->deleteComment($id);
        $this->ListingArticle();
    }

    public function signal($idcommentaire)
    {
        $flag = $this->commentManager->flag($idcommentaire);
        $comment = $this->commentManager->find($idcommentaire);
        $this->controllerArticle->detail($comment['id_article']);
    }

    public function deSignal($idcommentaire)
    {
        $flag = $this->commentManager->deFlag($idcommentaire);
        $comment = $this->commentManager->find($idcommentaire);
        $this->controllerArticle->detail($comment['id_article']);
    }

    public function pageConnect()                                      // function pour afficher page connection.
    {

        include_once("./app/view/connect.php");
    }

    public function adminParameter()
    {
        include_once("./app/view/parameter-admin.php");
    }

    public function only_comment()                                     // function pour bouton commentaires dans page admin .
    {

        $comments = $this->commentManager->findAll();
        require_once(dirname(__FILE__) . '/../view/commentaires.php');
    }

}

