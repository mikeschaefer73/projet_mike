<?php
if (!isset($_SESSION)) {
    session_start();

}
include_once(dirname(__FILE__) . '/../Model/DatabaseConnect.php');

class AdminManager

{
    private $bdd;                                                  // fontion pour connecter a la base de donnée automatiquement

    function __construct()
    {
        $DatabaseConnect = new DatabaseConnect();
        $this->bdd = $DatabaseConnect->getDatabase();
    }

    public function checkPassword($pseudo)                 // verification dans la base du mot de pass
    {

        $responce = $this->bdd->prepare('SELECT pass FROM utilisateur WHERE pseudo =:pseudo');
        $responce->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
        $responce->execute();
        $data = $responce->fetch();
        return $data;
    }

    public function changePassword($id, $pseudo,$hashPass)
    {

        if ($_SESSION == true) {
            $response = $this->bdd->prepare("UPDATE utilisateur SET  pseudo = :pseudo, pass = :pass WHERE id = :id");
            if (!$response->execute(array('pseudo' => $pseudo, 'pass' => $hashPass, 'id' => $id,))) {
                print_r($response->errorInfo());
                exit;
            }
            $_SESSION['msg'] = 'mot de passe modifié avec succès ! !';
        } else {
            $_SESSION['msg'] = 'Vous n\'êtes pas connecté en administrateur !';
            include("./app/view/404.php");
            http_response_code(404);
            die;
        }
    }         // enregistrement mot de passe

}




