<?php

    session_start();

class AdminManager
{

    public function checkPassword($pseudo, $pass)               // fonction pour verifier mot de pass
    {
        if (isset($pseudo) and $pseudo == 'jean' and (isset($pass) and $pass == "livre")) {
            $_SESSION['is_admin'] = true;
            return true;
        }
         else { include("./app/view/erreur-login.phtml");
            unset($_SESSION['is_admin']);

             return false;
        }

    }



}

