<?php
if(!isset($_SESSION)){
    session_start();
}
class AdminManager
{

    public function checkPassword()               // fonction pour verifier mot de pass
    {
        if (isset($_POST['pseudo']) and $_POST['pseudo'] == 'jean') {
            $_SERVER['is_admin'] = true;
            return true;
        }
        elseif (isset($_POST['pass']) and $_POST['pass'] == "livre") {
            $_SESSION['is_admin'] = true;
            return true;
        } else {
            unset($_SESSION['is_admin']);
            return false;
        }

    }



}

