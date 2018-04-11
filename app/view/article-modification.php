<?php
if ($_SESSION == false) {
    include("./app/view/404.php");
    http_response_code(404);
    return;
}
?>

<html>
            <?php include("Layout-head.php"); ?>
     <body>
        <div class="background2">
            <?php include("Layout-header.php"); ?>
            <div class="container">
                <h1 class="text-center">Modification des Billets</h1>
                <table>
                    <form class="form-group" method="post" action="articleModification">
                        <br>
                        <input type="hidden" value="<?php echo $article['id']; ?>" name="id"/>
                        <label for="title"><h4 style="color: white">Titre</h4></label> : <input value="<?php echo $article['title']; ?>" type="text" name="title" id="title"/><br/>
                        <label for="content"><h4></h4></label>
                        <br/>
                        <textarea name="content" id="content" rows="15" cols="80"><?php echo $article['content']; ?></textarea>
                        <br/>
                        <input class="btn btn-primary btn-lg btn3d glyphicon glyphicon-ok " type="submit" name="submit" value="Modifier"/>
                    </form>
                </table>
                <p><a href='return_admin' style="color: #bd2130">Retour page Admin</a></p>
            </div>
            <?php include("Layout-footer.php"); ?>
        </div>
    </body>
</html>