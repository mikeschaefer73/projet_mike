<?php

class Commentaire
{
    /**
     * @var string                     $pseudo                           pseudo du commentateur
     */

    private $pseudo;

    /**
     * @var string                     contenue                          text du commentaire
     */

    private $contenue;


    /**
     * @var int                         article_id                        jointure de table
     */

    private $article_id;

    /**
     * @param string $pseudo
     */

                          // setter

    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    /**
     * @param string $contenue
     */
    public function setContenue($contenue)
    {
        $this->contenue = $contenue;
    }

    /**
     * @param int $article_id
     */
    public function setArticleId($article_id)
    {
        $this->article_id = $article_id;
    }

                  // getter

    /**
     * @return string
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * @return string
     */
    public function getContenue()
    {
        return $this->contenue;
    }

    /**
     * @return int
     */
    public function getArticleId()
    {
        return $this->article_id;
    }

}

