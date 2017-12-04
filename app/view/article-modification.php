<?php
if (!isset($_SESSION)) {
    session_start();
} ?>

<header>
    <?php include("Layout-header.phtml"); ?>
</header>


<div class="container">


    <h2 class="text-center">modification des Billets</h2>

<table>
    <form method="post" action="update_articles">



        <br>
        <input type="hidden" value="<?php echo $article['id']; ?>" name="id"/>
        <label for="title"><h4>Titre</h4></label> : <input value="<?php echo $article['title']; ?>" type="text" name="title" id="title"/><br/>


        <label for="content"><h4>Articles</h4></label>


        <br/>
        <textarea name="content" id="content" rows="15" cols="80"><?php echo $article['content']; ?></textarea>

        <br/>

        <input type="submit" name="submit" value="Modifier"/>
        </p>

    </form>

</table>
    <p><a href='return_admin'>Retour page Admin</a></p>
</div>


    <?php include("Layout-footer.phtml"); ?>


