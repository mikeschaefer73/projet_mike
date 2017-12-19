<?php
include_once(dirname(__FILE__) . '/../Model/DatabaseConnect.php');



class commentManager

{
    private $bdd;

    function __construct()               // fontion pour connecter a la base de donnée automatiquement
    {
        $DatabaseConnect = new DatabaseConnect();
        $this->bdd = $DatabaseConnect->getDatabase();
    }



    public function insertComment($pseudo, $content, $id_article)                   // fontion pour créer commentaire
    {
        $response = $this->bdd->prepare("INSERT INTO commentaire (pseudo, content, comment_date, id_article) VALUES (:pseudo, :content, NOW(), :id_article);");
        $response->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $response->bindValue(':content', $content, PDO::PARAM_STR);
        $response->bindValue(':id_article', $id_article, PDO::PARAM_INT);
        $response->execute();


    }

    public function findAll(){
        $response = $this->bdd->query('SELECT * FROM commentaire');
        $data = $response->fetchAll();
        return $data;
    }

    public function deleteComment($id){                                 // fonction pour suprimer les commentaires  //
        $response = $this->bdd->prepare('DELETE FROM commentaire WHERE id =:id');
        if (!$response->execute(array('id' => $id ))) {
            print_r($response->errorInfo());
            exit;
        }
        $_SESSION['msg'] = 'Article suprimer avec succès !';

    }
}