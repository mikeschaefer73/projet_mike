<!DOCTYPE html>
<html>

    <?php include("Layout-head.php"); ?>

    <body>
        <div class="background1">
            <?php include("Layout-header.php"); ?>
            <div class="titre"><h1>Billet simple pour<br>l'Alaska</h1></div>
        </div>

        <div class="background">
            <div class="container">
                <div class="row">
                    <aside class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="billets">
                            <h2 id="Billets">Billets</h2>
                        </div>
                        <p class="border"><?php foreach ($articles as $article) : ?></p>
                        <p class="text1">
                            <?php echo $article['title']; ?>
                            <?php $apercu = substr($article['content'], 0, 269);
                            echo html_entity_decode($apercu) . " (......) ";
                            ?>
                            <a href="detail?article=<?= $article['id']; ?>">detail du Billet</a>
                        </p>
                        <p><?php echo $article['author']; ?> <br>
                            Poster le :
                        <?php $datef = DateTime::createFromFormat('Y-m-d H:i:s', $article['date_article']);
                                echo $datef->format('d-m-Y');
                            ?>
                        <hr>
                        <?php endforeach; ?>
                    </aside>
                </div>
            </div>
            <div class="logo">
                <a href="https://www.facebook.com" target="_blank"><img src="../img/facebook.png" alt="logo"/></a>
                <a href="https://accounts.google.com" target="_blank"><img src="../img/twitter.png" alt="logo"/></a>
                <a href="https://twitter.com/?lang=fr" target="_blank"><img src="../img/googleplus.png" alt="logo"/></a>
            </div>
            <!-- footer commun a toutes les pages -->
            <?php include("Layout-footer.php"); ?>
        </div>
    </body>
</html>
