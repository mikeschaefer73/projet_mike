

<?php

class Article
{
    /**
     * @var string                     $id                           id article
     */

    private $id;


    /**
     * @var string                    $titre                          titre des articles
     */

    private $titre;

    /**
     * @var string                   $contenue                       texte de l'article
     */

    private $contenue;

    /**
     * @var string                    $auteur                        nom de l'auteur
     */

    private $auteur;

    /**
     *   int                          $date_article                   date de l'article
     */

    private $dateArticle;

                                           // setter

    /**
     * @param string $titre
     */

    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    /**
     * @param string $contenue
     */

    public function setContenue($contenue)
    {
        $this->contenue = $contenue;
    }

    /**
     * @param string $auteur
     */

    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;
    }

    /**
     * @param mixed $dateArticle
     */

    public function setDateArticle($dateArticle)
    {
        $this->dateArticle = $dateArticle;
    }

                                         // getter
    /**
     * @return string
     */

    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @return string
     */

    public function getContenue()
    {
        return $this->contenue;
    }

    /**
     * @return string
     */

    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * @return mixed
     */

    public function getDateArticle()
    {
        return $this->dateArticle;
    }


}