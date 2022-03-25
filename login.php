<?php

    @ini_set('display_errors', true);

    if (isset($_POST['valid_login'])){
        require_once 'app/core/account/process.login.php';

        $l = new \LSPD\App\Core\Account\LoginManager($_POST['username'], $_POST['password']);
    }

?>
<html>
<head>
    <title>
        Connexion utilisateur
    </title>

    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, width=device-width">

    <link rel="stylesheet" href="app/assets/css/account.main.css">
</head>
<body>
    <div class="container">
        <div class="inner">
            <h1>Connexion</h1>
            <img src="app/assets/img/HxYJsEA.png">
            <form method="post" action="">
                <input type="text" name="username" placeholder="Nom d'utilisateur">
                <input type="password" name="password" placeholder="Mot de passe">
                <button type="submit" name="valid_login">S'identifier</button>
            </form>
        </div>
    </div>
</body>
</html>
