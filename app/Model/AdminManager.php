<?php
if (!isset($_SESSION)) {
    session_start();

}
include_once(dirname(__FILE__) . '/../Model/DatabaseConnect.php');

class AdminManager

{ private $bdd;

    function __construct()               // fontion pour connecter a la base de donnée automatiquement
    {
        $DatabaseConnect = new DatabaseConnect();
        $this->bdd = $DatabaseConnect->getDatabase();
    }

    public function checkPassword($pseudo ,$pass)
    {
       $responce = $this->bdd->prepare('SELECT pass FROM utilisateur WHERE pseudo =:pseudo');
       $responce->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
       $responce->execute();
       $data = $responce->fetch();

       return $data;



       }


    

    
}




