
<header>
    <?php include("Layout-header.phtml"); ?>
</header>


<div class="container">
    <p><a href="admin.phtml">Retour page Admin</a></p>

    <h2>modification des Billets</h2>

<table>
    <form method="post" action="update_articles.phtml">
        <label for="id">id</label> : <input type="text" name="id" id="id"/><br/>
        <br>
        <label for="title">Titre</label> : <input type="text" name="title" id="title"/><br/>

        <label for="content">
            Articles
        </label>
        <br/>
        <textarea name="content" id="content" rows="15" cols="80"></textarea><br/>

        <label for="author">Auteur</label> : <input type="text" name="author" id="author"/><br/>

        <input type="submit" name="submit" value="Modifier"/>
        </p>

    </form>
</table>
</div>


    <?php include("Layout-footer.phtml"); ?>


