<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once(dirname(__FILE__) . "/../Controller/Controller.php");?>


<!--  header  -->

<?php include("Layout-header.phtml"); ?>



<!--  header  -->

<h2> Bonjour jean ecrivons un nouveaux billets </h2>

<br>




<?php
if (!empty($_SESSION['msg'])) {
    echo '<h2 style="background:green;color:white;">' . $_SESSION['msg'] . '</h2>';
    unset($_SESSION['msg']);
}
?>


<form method="post" action="save_article">
    <label for="title">Titre</label> : <input type="text" name="title" id="title"/><br/>

    <label for="content">
        Articles
    </label>
    <br/>
    <textarea name="content" id="content" rows="15" cols="80"></textarea>


    <br/>
    <label for="author">Auteur</label> : <input type="text" name="author" id="author"/><br/>

    <input type="submit" name="submit" value="Poster"/>
    </p>

</form>
<p><a href="/app/view/admin.phtml">Retour page d'administration</a></p>

<footer>
    <?php include("Layout-footer.phtml"); ?>
</footer>
</body>
</html>