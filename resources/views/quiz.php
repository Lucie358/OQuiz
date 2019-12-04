<?php
include __DIR__ . '/layouts/header.tpl.php';

?>
<div class="container-fluid">
    <div class="header-quiz">
        <h2> <?= $quiz->title ?>
            <span class="font-italic"><?= $nbQuestions ?> questions</span>
        </h2>
        <h4>
            <?= $quiz->description ?>
        </h4>



        <p>by <?= $quiz->appusers->firstname . ' ' . $quiz->appusers->lastname ?></p>

        <div class='tag-quiz'>
            <?php
            foreach ($quiz->tags as $tag) : ?>
                <a class="tag-quiz-link" href=" <?= route('quizzesByTag', ['id' => $tag->id]) ?>" class="badge p-3 m-3 " style=<?= '"color:black; background-color:' . $tag->color . '"; color: black;' ?>><?= $tag->name ?></a>
            <?php endforeach;   ?>
        </div>
        <?php if (isset($formValid) && $formValid && isset($nbBonneReponse)) {

            echo ('<p class="score">' . $truc['result'] . ' Tu as eu ' . $nbBonneReponse . ' bonnes réponses sur ' . $nbQuestions . '.</p>');
        }
        ?>
        <?php foreach ($messages as $message) : ?>
        <div class="message" style=<?= '"background-color:'.$message['type'].'"' ?> role="alert">
            <?= $message['text'] ?>
        </div>
    <?php endforeach; ?>
    </div>



    

    <form action="" method="post">
        <div class='questions-list'>
            <?php foreach ($quiz->questions as $question) : ?>
                <?php $colorAnswerClass = '';
                        $reponse='';
                if (isset($reponseResultat[$question->id])) {
                    if ($reponseResultat[$question->id]) {
                        $colorAnswerClass = 'bg-success';
                        
                        
                    } else {
                        $colorAnswerClass = 'bg-danger';
                        $reponse= 'La réponse était: '.$question->rightAnswer->description;
                    }
                }
                ?>
                <div class="card-quiz <?= $colorAnswerClass ?>">
                    
                    <span class='card_quiz-level' style=<?= '"background-color:' . $question->levels->color . '; width:80px; color: white";' ?>><?= $question->levels->name ?></span>

                    <div>
                        <p><?= '• ' . $question->question ?></p>
                    </div>
                    <div>
                        <?php foreach ($question->answers->shuffle() as $answer) : ?>
                            <div>
                                <label for="exampleRadios<?php echo $answer->id; ?>">

                                    <input <?php if (isset($reponseUser[$question->id]) && $reponseUser[$question->id] == $answer->id) {
                                                echo "checked= 'checked'";
                                            } ?> type="radio" name="reponse[<?php echo $question->id ?>]" id="exampleRadios<?php echo $answer->id; ?>" value="<?php echo $answer->id; ?>">

                                    <?php echo $answer->description ?>

                                </label>
                                
                            </div>
                            
                        <?php endforeach ?>

                    </div>
                    <p> <?= $reponse ?></p>
                    <div>
                        <p>Coup de pouce ->
                            <a target="_blank" class='wiki-link' href="<?= 'https://fr.wikipedia.org/wiki/' . $question->wiki ?>">Wikipedia</a></p>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        <div class="button_check">
            <button class='button-check_submit' type="submit">Vérifier</button>

        </div>
    </form>
</div>
<?php
include __DIR__ . '/layouts/footer.tpl.php';
?>