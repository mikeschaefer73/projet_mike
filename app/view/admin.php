<?php
if (!isset($_SESSION)) {
    session_start();

} ?>

<!DOCTYPE html>
<html>

<?php include("Layout-head.php"); ?>
<body>

    <div class="background2">

        <?php include("Layout-header.php"); ?>
        <h1> Administration</h1>


        <div class="container">

            <div class="msg">
                <?php
                if (!empty($_SESSION['msg'])) {

                    echo '<h3>' . $_SESSION['msg'] . '</h3>';
                    unset($_SESSION['msg']);
                }
                ?>
            </div>

            <td class="text-center text2">
                <a href="onlyArticle?article" class="btn btn-info btn-lg btn3d">
                    <span class="glyphicon glyphicon-ok"></span>
                    Billets
                </a>
                <a href="only_comment?article" name="id" class="btn btn-info btn-lg btn3d">
                    <span class="glyphicon glyphicon-ok"></span>
                    Commentaires
                </a>
                <a href="newArticle" name="id" class="btn btn-success btn-lg btn3d">
                    <span class="glyphicon glyphicon-ok"></span>
                    Créer un nouveau billet
                </a>
                <a href="adminParameter" name="id" class="btn btn-default btn-lg btn3d">
                    <span class="glyphicon glyphicon-ok"></span>
                    Changer mes identifiants
                </a>
            </td>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">Titre</th>
                        <th class="text-center">Billets</th>
                        <th class="text-center">Action</th>
                        <th class="text-center">Suppression</th>
                    </tr>
                </thead>


                <?php foreach ($articles as $article): ?>

                <tr>
                    <td class="background4">
                        <p class="text"><?php echo $article['title']; ?></p>
                    </td>
                    <td class="text2">
                        <p><?php echo html_entity_decode($article['content']); ?></p>
                        <p><?php echo $article['author']; ?></p>

                        <p>Posted by Auteur :
                            <?php
                            $datef = DateTime::createFromFormat('Y-m-d H:i:s', $article['date_article']);
                            echo $datef->format('d-m-Y');
                            ?>
                        </p>
                    </td>
                    <td class="text-center text2">
                        <a href="edit?article=<?= $article['id']; ?>" class="btn btn-success btn-lg btn3d"><span
                                    class="glyphicon glyphicon-ok"></span>Modifier
                        </a>
                    </td>
                    <td class="text-center text2">
                        <button type="button" class="btn btn-danger btn-lg btn3d" data-toggle="modal" data-target="#exampleModal<?= $article['id']; ?>">
                            Supprimer
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal<?= $article['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Supprimer un Article</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Voulez-vous supprimer cet article ?
                                        <br>
                                        <?php echo substr($article['title'], 0, 50) ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                        <a href="delete?article=<?= $article['id']; ?>" name="id" class="btn btn-danger">Supprimer
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
        </div>
                </tr>
                <?php endforeach; ?>
            </table>


                <table class="table table-bordered">
                    <h1> Administration des Commentaires</h1>
                    <br/>
                    <thead>
                        <tr>
                            <th class="text-center">Pseudo</th>
                            <th class="text-center">Commentaire</th>
                            <th class="text-center">Action</th>
                            <th class="text-center">Validation</th>
                        </tr>
                    </thead>

                <?php foreach ($comments as $comment): ?>

                <tr>
                    <td class="background4">
                        <p class="text"><?php echo $comment['pseudo'] ?></p>
                    </td>
                    <td class="text2">
                        <p><?php echo html_entity_decode($comment['content']); ?></p>
                        <p class="bouton3">Posté le :
                            <?php
                                $datef = DateTime::createFromFormat('Y-m-d H:i:s', $comment['comment_date']);
                                echo $datef->format('d-m-Y');
                            ?>
                        </p>
                    </td>
                    <td class="text-center text2">
                        <button type="button" class="btn btn-danger btn-lg btn3d" data-toggle="modal" data-target="#exampleModal<?= $comment['id']; ?>">
                            Supprimer
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal<?= $comment['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Supprimer un commentaire</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                     Voulez-vous supprimer ce commentaire ?
                                        <br>
                                        <?php echo substr($comment['content'], 0, 50) ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                        <a href="deleteCommentAdmin?comment=<?= $comment['id']; ?>" name="id" class="btn btn-danger">Supprimer
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>

                    <td class="text-center text2">
                        <?php
                        if ($comment['flag'] == 1) {
                            ?>
                                <a href="deSignal?id=<?= $comment['id']; ?>" class="btn btn-success btn-lg btn3d">
                                            <span class="glyphicon glyphicon-ok"></span>
                                            Autoriser et Voir
                                </a>
                                    <img src="/img/Restricted.ico" class="drapeau" alt="icon_drapeau" />
                        <?php
                        } else {
                            echo ' Commentaire non signalé';
                        }
                        ?>
                    </td>
                </tr>
    </div>

                <?php endforeach; ?>

            </table>

    </div>
            <?php include("Layout-footer.php"); ?>
</body>
</html>