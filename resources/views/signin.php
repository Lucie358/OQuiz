<?php
include __DIR__ . '/layouts/header.tpl.php';

?>



<form class='form animated fadeIn' action="" method="post" >
    <h1 class='form-title'> Se connecter </h1>
    <div class="form-group">
        <label for="InputEmail1">Adresse e-mail :</label>
        <input name="email" type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp" placeholder="exemple@exemple.com">
    </div>
    <div class="form-group">
        <label for="InputPassword">Mot de passe :</label>
        <input name="password" type="password" class="form-control" id="InputPassword" placeholder="Mot de passe">
    </div>
    <button type="submit" class="btn btn-secondary mb-2">Se connecter</button>
    <div id="register-link" class="text-right">
        <a href="<?= route('signup') ?>" class="text-info">S'inscrire</a>
    </div>
</form>

<?php
include __DIR__ . '/layouts/footer.tpl.php';
?>