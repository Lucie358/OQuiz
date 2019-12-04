<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utils\UserSession;

use App\Models\Quizzes;
use App\Models\Questions;





class QuizController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function quiz(Request $request, $id)
    {
        //dump($id);
        // ici, $id est {id} dans la route. Donc je vais récupérer le quiz à l'id correspondant. Si $id = 5 alors j'aurais le quiz 5.
        $quiz = Quizzes::where('id', $id)->first();
        //$nbQuestions = Questions::where('Quizzes_id', $id)->count();
        $nbQuestions = $quiz->questions->count();

        $tags = $quiz->tags;
        //dump($tags);
        //dump($quiz->questions[1]->answers_id);



        //$answers = Answers::where('questions_id', $id)->get();
        //dump($quiz->questions[$id]->answers);

        // $reponses = Questions::find($id)->answers;

        // foreach ($reponses as $reponse) {
        //     dump($reponse);
        //     //
        // }
        //dump($quiz->tags);

        //dump($nBquestions);
        //dump($quiz->title);
        //dump($questions);

        if (!UserSession::isConnected()) {
            return redirect(route('signin'));
        }
        return view('quiz', [
            'quiz' => $quiz,
            'nbQuestions' => $nbQuestions,
            'messages' => [],
        ]);
    }

    public function quizPost(Request $request, $id)

    {
        $truc = [];
        $messages = [];
        $formValid = true;

        $quiz = Quizzes::where('id', $id)->first();

        $nbQuestions = $quiz->questions->count();

        if ($request->getMethod() == 'POST') {

            //$reponseUser renvoi un tableau avec question[id]=>reponse[id] donnée par le joueur
            $reponseUser = $request->input('reponse');
            //dump($reponseUser);
            // Si l'utilisateur n'a pas répondu à toutes les questions on affiche un message
            if ($reponseUser == null || $nbQuestions !== count($reponseUser)) {
                $messages[] = [
                    'type' => 'crimson',
                    'text' => 'Vous devez répondre à toutes les questions'
                ];
                $formValid = false;
            }


            $reponseResultat = [];
            //dump($reponseUser);
            //dump($reponseUser[40]);
            $nbBonneReponse = 0;
            if ($formValid) {
                //Pour chaque questions du quiz:
                foreach ($quiz->questions as $question) {
                    //On stock la valeur de la réponse attendu (la bonne)
                    $rightAnswerId = $question->answers_id;
                    //Si la réponse de l'user a la question est == a la réponse de la question ($rightAnswer)
                    if ($reponseUser[$question->id] == $rightAnswerId) {
                        //On incrémente le nb de bonnes réponse 
                        $nbBonneReponse++;
                        //On stock dans un autre tableau si l'utilisateur à bien répondu à cette question ou non.
                        $reponseResultat[$question->id] = true;
                    } else {
                        $reponseResultat[$question->id] = false;
                    }
                    if ($nbBonneReponse >= 5) {
                        $truc['result'] = 'Bravo !';
                    } else {

                        $truc['result'] ='Dommage, ce sera peut-être mieux la prochaine fois ?';
                    
                    }
                }
            }
            //dump($reponseResultat);
            //dump($quiz->questions[2]->rightAnswer->description);

            return view('quiz', [
                'quiz' => $quiz,
                'nbQuestions' => $nbQuestions,
                'messages' => $messages,
                'formValid' => $formValid,
                'nbBonneReponse' => $nbBonneReponse,
                'reponseResultat' => $reponseResultat,
                'truc' => $truc,
                'reponseUser'=> $reponseUser
            ]);
        }
    }
}
