<?php
if (!isset($_SESSION)) {
    session_start();

} ?>

<html>

<?php include("Layout-head.phtml"); ?>

<body>

<div class="background2">
    <?php include("Layout-header.phtml"); ?>


    <div class="container">


        <h1 class="text-center">modification des Billets</h1>

        <table>
            <form class="form-group" method="post" action="articleModification">


                <br>
                <input type="hidden" value="<?php echo $article['id']; ?>" name="id"/>
                <label for="title"><h4>Titre</h4></label> : <input value="<?php echo $article['title']; ?>" type="text"
                                                                   name="title" id="title"/><br/>


                <label for="content"><h4>Articles</h4></label>


                <br/>
                <textarea name="content" id="content" rows="15" cols="80"><?php echo $article['content']; ?></textarea>

                <br/>

                <input class="btn btn-primary btn-lg btn3d glyphicon glyphicon-ok " type="submit" name="submit"
                       value="Modifier"/>
                </p>

            </form>

        </table>
        <p><a href='return_admin'>Retour page Admin</a></p>
    </div>


    <?php include("Layout-footer.phtml"); ?>
</div>

</body>
</html>