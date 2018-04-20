<!--  header  -->







<header>

    <nav class="header">
        <ul class="menu">
            <li><a class="ancre" href="../../index.php/">Accueil</a></li>
            <li><a class="ancre" href="../../index.php/#Billets">Billets</a><br/></li>
            <li><a class="connect" href="../../index.php/<?php echo true === @$_SESSION['is_admin'] ? 'logout' : 'pageConnect'; ?>"><?php echo true === @$_SESSION['is_admin'] ? 'Se déconnecter' : 'Se connecter'; ?></a></li>
            <li><a class="admin_page" href="return_admin<?php echo true === @$_SESSION['is_admin'] ? '' : 'return_admin'; ?>"><?php echo true === @$_SESSION['is_admin'] ? 'Admin' : ''; ?></a></li>

        </ul>
    </nav>

</header>










