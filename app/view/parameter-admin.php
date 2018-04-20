<?php
if ($_SESSION == false){
    include("./app/view/404.php");
    http_response_code(404);
    return;
} ?>


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
                        Changement d'identifiant</p>
                    <form class="login" method="post" action="newPassword">
                        <input type="hidden" name="id" id="id"
                               value="<?php echo @(int)$_POST['id'] = 1; ?>"/>
                        <input type="text" name="pseudo" id="pseudo" placeholder="Changement pseudo"/>
                        <input type="password" name="pass" id="pass" placeholder="Changement mot de passe"/>
                        <input type="submit" value="modifier" class="btn btn-success btn-sm"/>
                        <div class="remember-forgot">
                            <div class="row">

                                <div>
                                    <p><a href='return_admin' style="color: #bd2130;font-size:0.8em;">Retour page Admin</a></p>
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