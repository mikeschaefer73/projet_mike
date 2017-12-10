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

    public function insertComment()          // fontion pour créer commentaire avec retour message
    {

        $response = $this->bdd->prepare('INSERT INTO commentaire (pseudo, content, comment_date) VALUES(?, ?, NOW )');
        if (!$response->execute(array($_POST['pseudo'], $_POST['content'] ))) {
            print_r($response->errorInfo());
            exit;
        }


        require(dirname(__FILE__) . '/../view/detail.phtml');
    }
}