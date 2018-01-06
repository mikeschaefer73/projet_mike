<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once(dirname(__FILE__) . "/../Controller/ControllerArticle.php");?>


<!--  header  -->
<div class="background2">
<?php include("Layout-header.phtml"); ?>

<!--  header  -->
<div class="container">
<h1 class="text-center"> Bonjour jean ecrivons un nouveaux billets </h1>

<br>







<form class="form-group" method="post" action="save_article">
    <label for="title"><h4>Titre</h4></label> : <input type="text" name="title" id="title"/><br/>

    <label for="content">
        <h4>Articles</h4>
    </label>
    <br/>
    <textarea name="content" id="content" rows="15" cols="80"></textarea><br/>



    <label for="author"><h4>Auteur</h4></label> : <input type="text" name="author" id="author"/><br>

    <input class="btn btn-primary btn-lg btn3d glyphicon glyphicon-ok " type="submit" name="submit" value="Poster"/>


</form>
    <p><a href='return_admin'>Retour page Admin</a></p>
</div>

<footer>
    <?php include("Layout-footer.phtml"); ?>
</footer>
</div>




