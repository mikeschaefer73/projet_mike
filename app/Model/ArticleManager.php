<?php
include_once(dirname(__FILE__) . '/../Model/DatabaseConnect.php');

class ArticleManager                                                 //  gestion des articles
{
    private $bdd;

    function __construct()                                          // fontion pour connecter a la base de donnée automatiquement
    {
        $DatabaseConnect = new DatabaseConnect();
        $this->bdd = $DatabaseConnect->getDatabase();
    }

    public function findAll()                                      // fontion pour affiche tous les articles
    {
        $response = $this->bdd->query('SELECT * FROM article');
        $data = $response->fetchAll();
        return $data;
    }

    public function find($id)                                     // fontion pour affiche 1 article (detail) //
    {
        if (is_array($id)) {
            $id = intval($id['get']['article']);
        }
        if (is_string($id)) {
            $id = intval($id);
        }

        $response = $this->bdd->prepare('SELECT * FROM article WHERE id = :idArticle LIMIT 1');
        $response->bindValue('idArticle', $id);
        $response->execute();
        return $response->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($param_arr)                           // fontion pour créer article avec retour message

    {
        if ($_SESSION == true) {
            $response = $this->bdd->prepare('INSERT INTO article (title, content, author, date_article) VALUES(?, ?, ?, NOW())');
            if (!$response->execute(array($param_arr['post']['title'], $param_arr['post']['content'], $param_arr['post']['author']))) {
                print_r($response->errorInfo());
                exit;
            }
            $_SESSION['msg'] = 'Article enregistré avec succès !';
            require(dirname(__FILE__) . '/../view/article-creation.php');
        } else {
            $_SESSION['msg'] = 'Vous n\'êtes pas connecter en administrateur !';
            include("./app/view/404.phtml");
            http_response_code(404);
            die;
        }


    }

    public function update_articles($id, $title, $content)        // fonction pour modifier les articles
    {
        if ($_SESSION == true) {
            $response = $this->bdd->prepare("UPDATE article SET  title = :title, content = :content WHERE id = :id");
            if (!$response->execute(array('title' => $title,
                'content' => htmlspecialchars($content), 'id' => $id))) {
                print_r($response->errorInfo());
                exit;
            }
            $_SESSION['msg'] = 'Article modifier avec succès !';
        } else {
            $_SESSION['msg'] = 'Vous n\'êtes pas connecter en administrateur !';
            include("./app/view/404.phtml");
            http_response_code(404);
            die;
        }
    }

    public function delete_Article($id)                           // fonction pour suprimer les articles //

    {
        if ($_SESSION == true) {
            if (is_array($id)) {
                $id = intval($id['get']['article']);
            }
            if (is_string($id)) {
                $id = intval($id);
            }
            $response = $this->bdd->prepare('DELETE FROM article WHERE id =:idArticle');
            if (!$response->execute(array('idArticle' => $id))) {

                print_r($response->errorInfo());
                exit;
            }
            $_SESSION['msg'] = 'Article suprimer avec succès !';
        } else {
            $_SESSION['msg'] = 'Vous n\'êtes pas connecter en administrateur !';
            include("./app/view/404.phtml");
            http_response_code(404);
            die;
        }
    }

    public function findAllComment($id)                          // fontion pour affiche tous les commentaires d'articles .
    {

        if (is_array($id)) {
            $id = intval($id['get']['article']);
        }
        if (is_string($id)) {
            $id = intval($id);
        }

        $reponse = $this->bdd->prepare('SELECT * FROM commentaire WHERE id_article = :idArticle');
        $reponse->bindValue('idArticle', $id);
        $reponse->execute();
        return $reponse->fetchAll(PDO::FETCH_ASSOC);

    }
}


