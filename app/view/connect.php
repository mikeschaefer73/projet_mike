<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link href="/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/css/connect.css"/>
        <title>page Admin</title>
    </head>

        <body>
            <div class="container">
                <div class="retourAccueil"
                <p><a href="/index.php/">Retour Accueil </a></p>
                <div class="row">
                    <div class="col-md-12">

                        <div class="wrap">

                            <p class="form-title">
                                s'identifier</p>
                            <form class="login" method="post" action="/index/identify">
                                <input type="text" name="pseudo" id="pseudo" placeholder="Votre pseudo"/>
                                <input type="password" name="pass" id="pass" placeholder="Votre mot de passe"/>
                                <input type="submit" value="Connexion" class="btn btn-success btn-sm"/>
                                <div class="remember-forgot">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="checkbox">
                                                <label>
                                                    <input value="1" type="checkbox"/>
                                                    Se souvenir de moi
                                                </label>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
                <?php
                if (!empty($_SESSION['msg'])) {
                    echo '<h1 class="erreur-login">' . $_SESSION['msg'] . '</h1>';
                    unset($_SESSION['msg']);
                }
                ?>
            </div>
            <br>
        </body>
</html>


