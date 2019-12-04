<?php
include __DIR__ . '/layouts/header.tpl.php';
?>
<div id="particles-js"></div>
<div class='particlediv'>
    <h1 class="center">La page demandée n'existe pas... </h1>
    <img class="img-404" src="<?= url('img/page-not-found.png') ?>" alt="https://icones8.fr">
    <h5 class='center'> ... Ou plus. </h5>
</div>


<script src="<?= url('vendors/particles.min.js') ?>"></script>
<script> particlesJS.load('particles-js', '<?= url('js/particlesjs-config.json') ?>', function() {
  console.log('callback - particles.js config loaded');
});</script>

<?php
include __DIR__ . '/layouts/footer.tpl.php';
?>