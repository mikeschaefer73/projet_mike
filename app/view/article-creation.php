<?php
if ($_SESSION == false) {
    include("./app/view/404.php");
    http_response_code(404);
    return;
}


require_once(dirname(__FILE__) . "/../Controller/ControllerArticle.php"); ?>

<html>

                <?php include("Layout-head.php"); ?>

    <body>

    <!--  header  -->
        <div class="background2">
            <?php include("Layout-header.php"); ?>

            <!--  header  -->
            <div class="container">
                <h1 class="text-center"> Bonjour jean ecrivons un nouveaux billets </h1>
                <div class="msg">
                    <?php
                        if (!empty($_SESSION['msg'])) {
                            echo '<h3>' . $_SESSION['msg'] . '</h3>';
                            unset($_SESSION['msg']);
                        }
                    ?>
                </div>
                <br>

                <form class="form-group" method="post" action="newArticle" novalidate>
                    <label for="title"><h4 style="color: white">Titre</h4></label> : <input type="text" value="<?php if (isset($title)) {echo $title;} ?>" name="title" id="title"/><br/>
                    <label for="content">

                    </label>
                    <br/>
                    <textarea name="content" id="content" required="false" rows="15" cols="80"><?php if (isset($content)) {echo $content;} ?> </textarea><br/>
                    <label for="author"><h4 style="color: white">Auteur</h4></label> : <input type="text" value="<?php if (isset($author)) {echo $author;} ?>" name="author" id="author"/><br>
                    <input class="btn btn-primary btn-lg btn3d glyphicon glyphicon-ok " type="submit" name="submit" value="Poster"/>
                </form>
                <p><a href='return_admin' style="color: #bd2130;font-size:1.5em;">Retour page Admin</a></p>
            </div>

            <footer>
                <?php include("Layout-footer.php"); ?>
            </footer>
        </div>

    </body>
</html>


