
<header>
    <?php include("header.phtml"); ?>
</header>


<p> Article Modification <a href="article-creation">Retour</a></p>


<h2>modification des articles</h2>


</form>

<table>

    <form method="post" action="update_articles.phtml">
        <label for="id">id</label> : <input type="text" name="id" id="id"/><br/>
        <br>
        <label for="title">Titre</label> : <input type="text" name="title" id="title"/><br/>

        <label for="content">
            Articles
        </label>
        <br/>
        <textarea name="content" id="content" rows="15" cols="80"></textarea>


        <br/>
        <label for="author">Auteur</label> : <input type="text" name="author" id="author"/><br/>

        <input type="submit" name="submit" value="Modifier"/>
        </p>

    </form>
</table>

<footer>
    <?php include("footer.phtml"); ?>
</footer>

</body>
</html>