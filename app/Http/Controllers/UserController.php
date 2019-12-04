<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utils\UserSession;

use App\User;


class UserController extends Controller
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
    public function signup(Request $request)
    {
        return view('signup');
    }


    public function signupAction(Request $request)
    {
        // On doit initialiser $messages qu'importe la méthode HTTP qui nous amène à ce contrôleur pour éviter une erreur lord de l'envoi à la vue
        $messages = [];

        if ($request->getMethod() == 'POST') {
            // Le code à exécute lors de l'envoi du formulaire

            $firstname = $request->input('firstname');
            $lastname = $request->input('lastname');
            $email = $request->input('email');
            $password = $request->input('password');
            $passwordCheck = $request->input('passwordcheck');

            // On vérifie les données reçues depuis le formulaire
            // On vérfie d'abord sir le username a au moins 2 caractères
            if (strlen($firstname) == 0 || strlen($lastname) == 0) {
                $messages[] = [
                    'type' => 'crimson',
                    'text' => 'Vous devez remplir ce champ'
                ];
            }

            // On teste si l'e-mail est valide
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $messages[] = [
                    'type' => 'crimson',
                    'text' => 'L\'adresse email fournie n\'est pas valide.'
                ];
            }

            // On vérifie que le mot de passe est suffisament long et que le les deux mdp sont identiques
            if ($password != $passwordCheck) {
                $messages[] = [
                    'type' => 'crimson',
                    'text' => 'Les deux mots de passe sont différents.'
                ];
            } else if (strlen($password) < 6) {
                $messages[] = [
                    'type' => 'crimson',
                    'text' => 'Ce mot de passe est trop court.'
                ];
            }

            // Si le nombre de message est égal à 0, tout va bien et on peut ajouter notre User à la BDD
            if (count($messages) == 0) {
                // Pour créer un nouvel utilisateur il faut créer un nouvel objet de la classe User
                $newUser = new User();
                $newUser->firstname = $firstname;
                $newUser->lastname = $lastname;
                $newUser->email = $email;
                $newUser->password = password_hash($password, PASSWORD_DEFAULT);
                $newUser->save();

                // Une fois que le nouveau User est ajouté en base de données, on peut prévenir l'utilisateur que tout a correctement fonctionné
                $messages[] = [
                    'type' => 'yellowgreen',
                    'text' => 'Votre compte a bien été créé. Vous pouvez désormais vous connecter.'
                ];
                
            }
        }
        return view('signup', [
            'messages' => $messages
        ]);
    }



    public function signinAction(Request $request)
    {
        if ($request->getMethod() == 'POST') {
            // Le code à exécute lors de l'envoi du formulaire

            // Pour une connexion, on doit vérifier le mot de passe et le login de l'utilisateur
            // On va récupérer un utilisateur grâce à l'email dans la BDD
            // where() est une méthode du Query Builder (constructeur de requête) et elle retourne toujours un objet Builder
            // get() est la méthode qui exécute la requête SQL créée grâce au Query Builder
            // get() retourne toujours une Collection même si on a un seul résultat
            // On utilise first() (méthode de la classe Collection) pour obtenir le premier/seul objet User de la requête
            $user = User::where('email', $request->input('email'))->get()->first();
            // Autre solution possible : $user = User::all()->firstWhere('email', $request->input('email'));

            // $user est soit un objet User si lêmail existe dans la BDD, soit il a pour valeur null
            // On vérifie si $user est une objet de la classe User
            if ($user instanceof User) {
                // On vérfie donc le mot de passe
                if (password_verify($request->input('password'), $user->password)) {
                    // Le mot de passe et l'email sont bons. On demande donc à la classe UserSession de connecter l'utilisateur

                    UserSession::connect($user);
                    // dump($_SESSION); // On peut dump $_SESSION car c'est une variable superglobale

                    // On redirige l'utilisateur sur la page admin
                    return redirect(route('account'));
                }
            }
        }
        return view('signin');
    }

    public function logoutAction(Request $request)
    { 
        // On utilise la méthode disconnect() pour détruire la session
        UserSession::disconnect();

        // Il faut ensuitte rediriger l'utilisateur vers une autre route
        return redirect(route('home'));
    }

    public function account(Request $request)
    {
        if (!UserSession::isConnected()) {
            return redirect(route('home'));
        }
        return view('account');
     }
}
