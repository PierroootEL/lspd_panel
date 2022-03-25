<?php

    @ini_set('display_errors', true);

    require_once 'app/core/add/citizenAmend.php';

    $amend = new \LSPD\App\Core\Add\CitizenAmend();

    if (isset($_POST['valid_add'])){
        require_once '/var/www/pierre/lspd/app/core/add/citizenAmend.php';
        $amend->newAmend($_POST['citizenID'], $_POST['reason'], $_POST['price']);
    }

?>
<html>
<head>
    <title>
        Ajouter une amende
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
            <select name="citizenID">
                <?php $amend->addAmendSelectMenu(); ?>
            </select>
            <input type="text" name="reason" placeholder="Raison de l'amende" required>
            <input type="number" name="price" placeholder="Prix de l'amende" required>
            <button type="submit" name="valid_add">Ajouter</button>
        </form>
    </div>
</div>
</body>
</html>
