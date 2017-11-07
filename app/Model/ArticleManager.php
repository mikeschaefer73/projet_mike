<?php
include_once(dirname(__FILE__) . '/../Model/DatabaseConnect.php');

class ArticleManager        //  gestion des articles
{
    private $bdd;

    function __construct()               // fontion pour connecter a la base de donnée automatiquement
    {
        $DatabaseConnect = new DatabaseConnect();
        $this->bdd = $DatabaseConnect->getDatabase();
    }

    public function findAll()                 // fontion pour affiche tous les articles
    {

        $response = $this->bdd->query('SELECT * FROM article');
        $data = $response->fetchAll();
        return $data;
    }

    public function find($id)          // fontion pour affiche 1 raticle
    {

        $response = $this->bdd->prepare('SELECT * FROM article WHERE id = :idArticle LIMIT 1');
        $response->bindValue('idArticle', $id);
        $response->execute();
        return $response->fetch(PDO::FETCH_ASSOC);
    }

    public function insert()          // fontion pour créer article avec retour message
    {

        $response = $this->bdd->prepare('INSERT INTO article (title, content, author, date_article) VALUES(?, ?, ?, NOW())');
        if (!$response->execute(array($_POST['title'], $_POST['content'], $_POST['author']))) {
            print_r($response->errorInfo());
            exit;
        }

        $_SESSION['msg'] = 'Article enregistré avec succès !';

        require(dirname(__FILE__) . '/../Vue/article-creation.php');
    }

    public function update_articles(){
        $response = $this->bdd->prepare('UPDATE article SET (id, title, content, author, date_article) VALUES (?, ?, ?, ? NOW())');
         if (!$response->execute(array($_POST['id'], $_POST['title'], $_POST['content'], $_POST['author']))) {
             print_r($response->errorInfo());
             exit;
         }
        $_SESSION['msg'] = 'Article modifier avec succès !';

        require(dirname(__FILE__) . '/../Vue/article-modification.php');
    }

    public function delete_Article(){
        $response = $this->bdd->prepare('DELETE FROM article WHERE id =:idArticle');
        if (!$response->execute(array($_POST['id']))) {
            print_r($response->errorInfo());
            exit;
        }
        $_SESSION['msg'] = 'Article suprimer avec succès !';
    }





}


