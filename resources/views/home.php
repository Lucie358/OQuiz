<?php
include __DIR__ . '/layouts/header.tpl.php';

?>

<script>
  function displayLogoutMsg() {
    toastr.success('Vous avez bien été déconnecté.', '', {
      "positionClass": "toast-bottom-right",
      "timeOut": "5000",
    })
  }

  document.addEventListener('DOMContentLoaded', function() {
    <?php if (isset($_SESSION['hasLoggedOut']) && ($_SESSION['hasLoggedOut'])) {
      echo 'displayLogoutMsg()';
      $_SESSION['hasLoggedOut'] = false;
    } ?>
  }, false);
</script>



<div class='header_home'>
  
  <img src="<?= url('img/accueil.png') ?>" class="home-img" alt="">
  <div class='text-home'>
    <p>
      Pour participer à l'un de nos quiz et tester tes connaissances, cliques sur l'un des quiz ci-dessous et réponds aux questions. </p>
    <p>Tu dois cependant être connecté à ton compte pour pouvoir y répondre.</p>
  </div>


</div>
<div class='cards-list cards-list-home '>
  <?php foreach ($quizzes as $quiz) : ?>
    <a class='card animated fadeIn' href="<?= route('quiz', ['id' => $quiz->id]) ?> " style="width: 18rem;">



      <h5 class='card-title'><?= $quiz->title ?></h5>
      <h6 class="card-description"><?= $quiz->description ?></h6>
      <p class="card-author"><?= $quiz->appusers->firstname . ' ' . $quiz->appusers->lastname ?></p>

    </a>
  <?php endforeach; ?>
</div>



<?php
include __DIR__ . '/layouts/footer.tpl.php';
?>