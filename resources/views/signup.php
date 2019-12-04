<?php
include __DIR__ . '/layouts/header.tpl.php';

?>


<div class="container">
    <form class='form  animated fadeIn' action="<?= route('signup') ?>" method="post">
        <h1 class='form-title'> S'inscrire </h1>
        <div>
            <label for="firstname">Prénom :</label>
            <input type="text" id="firstname" name="firstname" value="<?php
                                                                        if (isset($_POST['firstname'])) {
                                                                            echo $_POST['firstname'];
                                                                        }
                                                                        ?>">
        </div>
        <div>
            <label for="lastname">Nom :</label>
            <input type="text" id="lastname" name="lastname" value="<?php
                                                                    if (isset($_POST['lastname'])) {
                                                                        echo $_POST['lastname'];
                                                                    }
                                                                    ?>">
        </div>
        <div>
            <label for="InputEmail1">Adresse e-mail :</label>
            <input type="email" id="InputEmail1" aria-describedby="emailHelp" placeholder="exemple@exemple.com" name="email">
        </div>
        <div>
            <label for="InputPassword">Mot de passe :</label>
            <input type="password" id="InputPassword" placeholder="Mot de passe" name=password>
        </div>
        <div class="form-group">
            <label for="InputPassword">Entrez à nouveau votre mot de passe :</label>
            <input type="password" id="InputPasswordCheck" placeholder="Mot de passe" name=passwordcheck>
        </div>
        <button type="submit">S'inscrire</button>
        <div id='errors'></div>
        <div id="signin-link">
            <a href="<?= route('signin') ?>">Déjà inscrit ? Connectez-vous.</a>
        </div>
    </form>



    <?php foreach ($messages as $message) {
        echo ('<div class="message" role="alert" style="background-color:' . $message['type'] . '">' . $message['text'] . '</div>');
    }
    ?>
</div>

<?php
include __DIR__ . '/layouts/footer.tpl.php';
?>