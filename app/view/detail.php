<?php
require_once(dirname(__FILE__) . "/../Controller/ControllerArticle.php"); ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8"/>
    <link href="../../bootstrap/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../css/style.css"/>
    <link rel="stylesheet" type="text/css" href="../../css/admin.css"/>
    <link rel="stylesheet" type="text/css" href="../../css/detail.css"/>
    <style type="text/css"></style>
    <link rel="icon" type="image/png" href="../../img/livre.png"/>
    <title>Blog Jean Forteroche</title>
</head>

<body>

<div class="background2">
    <?php include("Layout-header.php"); ?>

    <h1 id="timeline">Billet de Jean</h1>

    <div class="cadre">
        <div class="container">
            <p>
            <h3><?php echo $article['title']; ?></h3>
            </p>
            <h4><?php echo html_entity_decode($article['content']); ?></h4>
            <p class="authorDetail">
                <?php echo $article['author']; ?><br>

                <?php echo 'paru le : ' ?>
                <?php
                $datef = DateTime::createFromFormat('Y-m-d H:i:s', $article['date_article']);
                echo $datef->format('d-m-Y');
                ?>
            </p>
        </div>
    </div>
    <div>
        <div class="container" style="padding-top:30px">

            <hr>
            <div class="span-3 well" style="padding-bottom:0">
                <form action="newComment" method="post">
                    <label for="content"><h1 style="padding-left: 300px;">Laissez un commentaire</h1></label>

                    <?php
                    if (!empty($_SESSION['msg'])) {
                        echo '<h3 class="msg">' . $_SESSION['msg'] . '</h3>';
                        unset($_SESSION['msg']);
                    }
                    ?>
                    <div class="cadre2">
                        <label for="pseudo"></label><br>
                        <input class="form-group mb-2" type="text" value="<?php if (isset($_POST['pseudo'])) {echo $_POST['pseudo'];} ?>" name="pseudo" style="margin-left: 25px; id="pseudo" placeholder="pseudo"/>
                        <br>
                        <textarea class="span4" id="content" name="content" placeholder="Laisser un commentaire"
                                  rows="10" cols="70" style="margin-left: 25px;"><?php if (isset($_POST['content'])) {echo $_POST['content'];} ?>
                        </textarea>

                        <input type="hidden" name="id_article" id="id_article"
                               value="<?php echo @(int)$article['id']; ?>"/>
                        <h6 class="pull-right" style="padding-left: 30px;padding-top: 10px;">Merci pour ce
                            commentaire</h6>
                        <button class="btn btn-primary btn-lg btn3d" type="submit" style="margin-left: 40px;"><span
                                    class="glyphicon glyphicon-ok"></span>Poster</a></button>
                </form>
            </div>
        </div>

        <hr>
        <h1 class="text-center">Vos Commentaires</h1>

        <table class="table table-bordered tableau">
            <thead>
            <tr>
                <th class="text-center">Pseudo</th>
                <th class="text-center">Commentaire</th>
            </tr>
            </thead>
            <?php foreach ($comments as $comment): ?>

                <tr>
                    <td class="background4">
                        <p class="text"><?php echo $comment['pseudo'] ?></p>
                    </td>
                    <td class="text2">
                        <p><?php echo($comment['content']); ?></p>
                        <p class="bouton2">Posté le :
                            <?php
                            $datef = DateTime::createFromFormat('Y-m-d H:i:s', $comment['comment_date']);
                            echo $datef->format('d-m-Y');
                            ?>
                        </p>
                        <div class="bouton1">
                            <?php if ($comment['flag'] == 0) {
                                echo "Signaler ce commentaire"; ?>
                                <a href="signal?id=<?= $comment['id']; ?>" name="flag"><img src="/img/drapeau.png"
                                                                                            class="drapeau"
                                                                                            alt="icon_drapeau"/></a>
                                <?php
                            } else {
                                echo ' Ce commentaire a eté signalé !! <img src="/img/Restricted.ico"  class="drapeau" alt="icon_drapeau"> ';
                            } ?>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
<div class="logo">
    <a href="https://www.facebook.com" target="_blank"><img src="../img/facebook.png" alt="logo"/></a>
    <a href="https://accounts.google.com" target="_blank"><img src="../img/twitter.png" alt="logo"/></a>
    <a href="https://twitter.com/?lang=fr" target="_blank"><img src="../img/googleplus.png" alt="logo"/></a>
</div>
<div class="row">
    <div class="col-lg-12">
        <?php include("Layout-footer.php"); ?>
    </div>
</div>
</body>
</html>