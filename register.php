<?php

    @ini_set('display_errors', true);

    if (isset($_POST['valid_register'])){
        if (!isset($_POST['perms'])){
            header('Location: /register.php?e=1');
        }
        require_once 'app/core/account/process.register.php';
        $r = new \LSPD\App\Core\Account\RegisterManager($_POST['nom'], $_POST['prenom'], $_POST['password'], $_POST['password_conf'], $_POST['perms']);
    }

    require 'app/core/errors/manager.register.php';
    $err = new \LSPD\App\Core\Errors\ErrorRegister();

?>
<html>
<head>
    <title>
        Création de compte utilisateur
    </title>

    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, width=device-width">

    <link rel="stylesheet" href="app/assets/css/add.form.css">
</head>
<body>
<div class="container">
    <div class="inner">
        <h1>Création compte</h1>
        <img src="app/assets/img/HxYJsEA.png">
        <form method="post" action="">
            <input type="text" name="nom" placeholder="Nom">
            <input type="text" name="prenom" placeholder="Prénom">
            <input type="password" name="password" placeholder="Mot de passe">
            <input type="password" name="password_conf" placeholder="Confirmation mot de passe">
            <select name="perms">
                <option disabled selected>Permissions accodées :</option>
                <option name="perms" value="basic">Officier</option>
                <option name="perms" value="2">Haut gradé</option>
            </select>
            <button type="submit" name="valid_register">S'identifier</button>
        </form>
        <a><?php (isset($_GET['e'])) ? $err->switchError($_GET['e']) : null; ?></a>
        <a href="/" class="back">Revenir en arrière</a>
    </div>
</div>
</body>
</html>
