<?php

    @ini_set('display_errors', true);

    if (isset($_POST['valid_add'])){
        require_once 'app/core/add/cityEntries.php';
        $newEntry = new \LSPD\App\Core\Add\CityEntries($_POST['nom'], $_POST['prenom'], $_POST['birth'], $_POST['sex']);
    }

?>
<html>
<head>
    <title>
        Ajouter un civil
    </title>

    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, width=device-width">

    <link rel="stylesheet" href="app/assets/css/add.form.css">
</head>
<body>
<div class="container">
    <div class="inner">
        <h1>Formulaire d'ajout</h1>
        <img src="app/assets/img/HxYJsEA.png">
        <form method="post" action="">
            <input type="text" name="nom" placeholder="Nom">
            <input type="text" name="prenom" placeholder="Prénom">
            <input type="date" name="birth" placeholder="Date de naissance">
            <select name="sex">
                <option name="sex" value="m" selected>Homme</option>
                <option name="sex" value="f">Femme</option>
            </select>
            <button type="submit" name="valid_add">Ajouter</button>
        </form>
    </div>
</div>
</body>
</html>
