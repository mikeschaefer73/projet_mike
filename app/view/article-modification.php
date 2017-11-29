<?php
if (!isset($_SESSION)) {
    session_start();
} ?>

<header>
    <?php include("Layout-header.phtml"); ?>
</header>


<div class="container">
    <p><a href="connection">Retour page Admin</a></p>

    <h2>modification des Billets</h2>

<table>
    <form method="post" action="update_articles">



        <br>
        <input type="hidden" value="<?php echo $article['id']; ?>" name="id"/>
        <label for="title">Titre</label> : <input value="<?php echo $article['title']; ?>" type="text" name="title" id="title"/><br/>


        <label for="content">Articles</label>


        <br/>
        <textarea name="content" id="content" rows="15" cols="80"><?php echo $article['content']; ?></textarea>

        <br/>

        <input type="submit" name="submit" value="Modifier"/>
        </p>

    </form>

</table>

</div>


    <?php include("Layout-footer.phtml"); ?>


