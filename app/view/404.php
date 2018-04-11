
<html>

         <?php include("Layout-head.php"); ?>

    <body>

            <div class="erreur_404">
                <?php include("Layout-header.php"); ?>     <!--  header  -->
                <div class="container">
                    <h2 class=""> Erreur 404 la page que vous demander n'existe pas !!! </h2>
                    <?php
                    if (!empty($_SESSION['msg'])) {
                        echo '<h1 class="msg">' .$_SESSION['msg']. '</h1>';
                        unset($_SESSION['msg']);
                    }
                    ?>
                </div>
            </div>

            <?php include("Layout-footer.php"); ?>

    </body>
</html>