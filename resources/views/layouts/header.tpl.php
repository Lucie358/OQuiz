<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">

    <!-- Reset CSS -->
    <link href="<?= url('css/reset.css') ?>" rel="stylesheet">

    <!-- Really beautiful CSS -->


    <link href="<?= url('css/style.css') ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Permanent+Marker|Roboto&display=swap" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">


</head>

<body>
    <header>

        <nav class='header_nav'>
            <div class='nav_container'>


                <ul>
                    <div class='nav_container'>

                        <li class="nav_item">
                            <a href="<?= route('home') ?>">Accueil </a>
                        </li>
                        <li class="nav_item">
                            <a href='<?= route('tagsList') ?>'>Les thèmes</a>
                        </li>
                    </div>
                </ul>
                <ul>
                    <div class='nav_container'>
                        <?php if ($user == null) { ?>

                            <li class="nav_item_button">
                                <a class='nav_link' href="<?= route('signin') ?>">Connexion</a>
                            </li>
                            <li class='nav_item_button'>
                                <a class='nav_link' href="<?= route('signup') ?>">Inscription</a>
                            </li>
                        <?php } else { ?>
                            <li class='nav_item_button'>
                                <a class='nav_link' href="<?= route('account') ?>">Mon compte</a>
                            </li class="nav_item">
                            <li class='nav_item_button' style="background-color:crimson;color:white;">
                                <a class='nav_link' id="logout" href="<?= route('logout') ?>">Se déconnecter</a>
                            </li>

                        <?php } ?>
                    </div>
                </ul>
            </div>
            <h1 class='nav-title'>
                <a href="<?= route('home') ?>">O'Quizz</a>
            </h1>
        </nav>



    </header>

    <main>




        <!-- <li>
                    <a href="#">
                        <i></i>
                        Mon compte
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i></i>
                        Déconnexion
                    </a>
                </li> -->