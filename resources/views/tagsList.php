<?php
include __DIR__ . '/layouts/header.tpl.php';



?>

<div class="tags-list">
    <?php
    foreach ($tagsList as $tag) : ?>
    <a href=" <?= route('quizzesByTag', ['id' => $tag->id]) ?>">
        <div class="tag"  style=<?= '"color:black; background-image:url(img/' . $tag->picture . ')"; color: black;' ?>>
            <p class='tag-name'><?= $tag->name ?></p>
           
        </div>
    </a>
    <?php endforeach ?>
</div>

<?php
include __DIR__ . '/layouts/footer.tpl.php';
?>