<?php
include __DIR__ . '/layouts/header.tpl.php';
?>

<div class="container-account">
    <?php
    if ($user != null) {
        ?><h1 class="centrer name_account">Bonjour <?= $user->firstname ?></h1><?php
                                                                    } ?>
    <h1 class="centrer your-account">Votre compte</h1>
    <img class="account-img" src="<?= url('img/account.png') ?>" alt="https://icones8.fr">

    <ul class='centrer infos-account'>
        <li class='info'><?= $user->firstname ?></li>
        <li class='info'> <?= $user->lastname ?></li>
        <li class='info'> E-mail : <?= $user->email ?></li>
        <li class='info'>Membre depuis : <?php echo date_format($user->created_at, "Y-F-d");  ?></li>

    </ul>

</div>
<?php
include __DIR__ . '/layouts/footer.tpl.php';
?>