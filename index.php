<?php
    @ini_set('display_errors', true);

    session_start();

    require_once 'app/core/database/request.php';
    $r = new \LSPD\App\Core\Database\Request();
    require_once 'app/core/account/session/manager.php';
    $s = new \LSPD\App\Core\Account\Session\SessionManager();
    $s->checkRight();
?>
<html>
<head>
    <title>
        Accueil
    </title>

    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, width=device-width">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <link rel="stylesheet" href="app/assets/css/index.css">
</head>
<body>
        <nav class="top">
            <h1>Los Santos Police Dept.</h1>
        </nav>
        <div class="container">
            <div class="box">
                <div class="box--header">
                    <i class="fa-solid fa-users"></i>
                    <h1>Derniers arrivants</h1>
                </div>
                <table>
                    <thead>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Date de naissance</th>
                        <th>Sexe</th>
                    </thead>
                    <tbody>
                    <?php
                        foreach ($r->returnAllCityEntries() as $amend){
                            print "
                                <tr>
                                    <td>{$amend['id']}</td>
                                    <td>{$amend['nom']}</td>
                                    <td>{$amend['prenom']}</td>
                                    <td>{$amend['birthdate']}</td>
                                    <td>{$amend['sex']}</td>
                                </tr>
                            ";
                        }
                    ?>
                    </tbody>
                </table>
                <div class="box--footer">
                    <button onclick="location.href='add.cityEntries.php'">Ajouter un civil</button>
                </div>
            </div>
            <div class="box">
                <div class="box--header">
                    <i class="fa-solid fa-book"></i>
                    <h1>Dernières amendes</h1>
                </div>
                <table>
                    <thead>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Date de naissance</th>
                            <th>Sexe</th>
                            <th>Motif</th>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($r->returnAllAmend() as $amend){
                        print "
                                <tr>
                                    <td>{$amend['amendID']}</td>
                                    <td>{$amend['nom']}</td>
                                    <td>{$amend['prenom']}</td>
                                    <td>{$amend['birthdate']}</td>
                                    <td>{$amend['sex']}</td>
                                    <td><a href='see.amend.php?id={$amend['amendID']}'>Plus</a></td>
                                </tr>
                            ";
                    }
                    ?>
                    </tbody>
                </table>
                <div class="box--footer">
                    <button onclick="location.href='add.newAmend.php'">Ajouter une amende</button>
                </div>
            </div>
            <div class="box">
                <div class="box--header">
                    <i class="fa-solid fa-handcuffs"></i>
                    <h1>Dernières arrestations</h1>
                </div>
                <table>
                    <thead>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Date de naissance</th>
                        <th>Sexe</th>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>Blanchard</td>
                        <td>Pierre</td>
                        <td>25/11/02</td>
                        <td>M</td>
                    </tr>
                    </tbody>
                </table>
                <div class="box--footer">
                    <button onclick="location.href='add.newAmend.php'">Ajouter un rescencement</button>
                </div>
            </div>
        </div>
</body>
</html>
