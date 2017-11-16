<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once(dirname(__FILE__) . "/../Controller/Controller.php");


if (!isset($_SESSION['is_admin']) or $_SESSION['is_admin'] !== true) {
    $controller = new controller;
    if (!$controller->identify()) {
        exit('<h2>Mauvais Mot de Passe !!' . '</h2> <br/>
        <p><a href="/index.php/">Retour Accueil </a></p>
        <p><a href="/app/Vue/connect.phtml">Retour page se connecter </a></p>');


    }
}
?>

<!--  header  -->

<?php include("header.phtml"); ?>

<!--  header  -->

<h2> Bienvenue Jean Forteroche </h2>

<br>

<h3>Ecrivons un nouveaux billets !!</h3>


<p><a href="/index.php/">Retour Accueil </a></p>

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
<p><a href="article-modification.php">supression ou modification Articles</a></p>

<footer>
    <?php include("footer.phtml"); ?>
</footer>
</body>
</html>