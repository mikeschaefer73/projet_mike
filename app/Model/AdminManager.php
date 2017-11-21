<?php
if(!isset($_SESSION)){
    session_start();
}
class AdminManager
{

    public function checkPassword($pseudo, $pass)               // fonction pour verifier mot de pass
    {
        if (isset($pseudo) and $pseudo == 'jean' and (isset($pass) and $pass == "livre")) {
            $_SERVER['is_admin'] = true;
            return true;
        }
         else {
            unset($_SESSION['is_admin']);

            return false;
        }

    }



}

