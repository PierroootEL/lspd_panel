<?php

    @ini_set('display_errors', true);

    require_once 'app/core/add/citizenAmend.php';

    $amend = new \LSPD\App\Core\Add\CitizenAmend();

?>
<html>
<head>
    <title>
        <?php print "Amende n° {$_GET['id']}"; ?>
    </title>

    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, width=device-width">

    <link rel="stylesheet" href="app/assets/css/see.form.css">
</head>
<body>
<div class="container">
    <div class="inner">
        <h1>Vu d'une amende</h1>
        <img src="app/assets/img/HxYJsEA.png">
        <form method="post" action="">
            <input type="text" value="<?php echo $amend->getAmendInformation($_GET['id'])['nom']; ?> <?php echo $amend->getAmendInformation($_GET['id'])['prenom']; ?>" readonly>
            <input type="text" value="Sexe : <?php echo $amend->getAmendInformation($_GET['id'])['sex']; ?>" readonly>
            <input type="text" value="Né le : <?php echo $amend->getAmendInformation($_GET['id'])['birthdate']; ?>" readonly>
            <textarea type="text" placeholder="<?php echo $amend->getAmendInformation($_GET['id'])['reason']; ?>" readonly></textarea>
            <input type="text" value="Ajouter a : <?php echo $amend->getAmendInformation($_GET['id'])['created_at']; ?>" readonly>
        </form>
        <a href="/" class="back">Revenir en arrière</a>
    </div>
</div>
</body>
</html>
