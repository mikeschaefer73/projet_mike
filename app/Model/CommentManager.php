<?php
include_once(dirname(__FILE__) . '/../Model/DatabaseConnect.php');


class commentManager

{
    private $bdd;

    function __construct()                                                     // fontion pour connecter a la base de donnée automatiquement
    {
        $DatabaseConnect = new DatabaseConnect();
        $this->bdd = $DatabaseConnect->getDatabase();
    }


    public function insertComment($pseudo, $content, $id_article)               // fontion pour créer commentaire
    {
        $response = $this->bdd->prepare("INSERT INTO commentaire (pseudo, content, comment_date, id_article) VALUES (:pseudo, :content, NOW(), :id_article);");
        $response->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $response->bindValue(':content', $content, PDO::PARAM_STR);
        $response->bindValue(':id_article', $id_article, PDO::PARAM_INT);
        $response->execute();
    }

    public function findAll()
    {
        $response = $this->bdd->query('SELECT * FROM commentaire');
        $data = $response->fetchAll();
        return $data;
    }

    public function deleteComment($id)                       // fonction pour suprimer les commentaires
    {
        if($_SESSION == true){
        $id = intval($id['get']['comment']);
        $response = $this->bdd->prepare('DELETE FROM commentaire WHERE id =:id');
        if (!$response->execute(array('id' => $id))) {
            print_r($response->errorInfo());
            return false;
        }
        $_SESSION['msg'] = 'Commentaire suprimer avec succès !';
        } else {
            $_SESSION['msg'] = 'Vous n\'êtes pas connecter en administrateur !';
            include("./app/view/404.phtml");
            http_response_code(404);
            die;
        }
    }

    public function flag($id)
    {
        $id = intval($id['get']['id']);
        $responce = $this->bdd->prepare("UPDATE commentaire SET  flag = 1 WHERE id =:id");
        if (!$responce->execute(array('id' => $id))) {
            print_r($responce->errorInfo());
            exit;
        }
    }

    public function find($id)
    {
        $id = intval($id['get']['id']);
        $response = $this->bdd->prepare('SELECT * FROM commentaire WHERE id = :id LIMIT 1');
        $response->bindValue('id', $id);
        $response->execute();
        return $response->fetch(PDO::FETCH_ASSOC);
    }
}