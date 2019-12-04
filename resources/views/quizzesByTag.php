<?php
include __DIR__ . '/layouts/header.tpl.php';



?>
<div class="container">
  <div class="title_home">
    <h1>Quiz du thème <?= $tags->name ?></h1>
  </div>
  <?php if ($quizzesByTag->isEmpty()) {

    echo ('<h4 class="title_home bg-danger "> Il n\'y a pas encore de quiz dans ce thème </h4>');
  }
  ?>

  <div class='cards-list'>
    <?php foreach ($quizzesByTag as $quizByTag) : ?>
      <a class='card' href="<?= route('quiz', ['id' => $quizByTag->id]) ?> " style="width: 18rem;">

        <h5 class='card-title'><?= $quizByTag->title ?></h5>
        <h6 class="card-description"><?= $quizByTag->description ?></h6>
        <p class="card-author"><?= $quizByTag->appusers->firstname . ' ' . $quizByTag->appusers->lastname ?></p>



      </a>
    <?php endforeach; ?>
  </div>


</div>
<?php
include __DIR__ . '/layouts/footer.tpl.php';
?>