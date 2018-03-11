<?php

class Databaseconnect
{

    public function getDatabase()
    {
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=blog_p3;charset=utf8', 'root', '');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        return $bdd;
    }           // fonction de connection a la base de donnée
}

