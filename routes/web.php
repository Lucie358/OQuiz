<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

// $router->get('/', function () use ($router) {
//     return $router->app->version();
// });
$router->get('/', [
    'as' => 'home',
    'uses' => 'MainController@homeAction'
]);

$router->get('/signup', [
    'as' => 'signup',
    'uses' => 'UserController@signupAction'
]);

$router->post('/signup', [
    'as' => 'signupPost',
    'uses' => 'UserController@signupAction'
]);


$router->get('/signin', [
    'as' => 'signin',
    'uses' => 'UserController@signinAction'
]);

$router->post('/signin', [
    'as' => 'signinPost',
    'uses' => 'UserController@signinAction'
]);

$router->get('/quiz/{id:[0-9]+}', [
    'as' => 'quiz',
    'uses' => 'QuizController@quiz'
]);

$router->post('/quiz/{id:[0-9]+}', [
    'as' => 'quiz',
    'uses' => 'QuizController@quizPost'
]);

$router->get('/tags', [
    'as' => 'tagsList',
    'uses' => 'TagController@tags'
]);

$router->get('/tags/{id}/quiz', [
    'as' => 'quizzesByTag',
    'uses' => 'TagController@quiz'
]);

$router->get('/logout', [
    'as' => 'logout',
    'uses' => 'UserController@logoutAction'
]);

$router->get('/account', [
    'as' => 'account',
    'uses' => 'UserController@account'
]);



// $router->get('quizz/{id}', function ($id) {
//     return 'Quiz '.$id;
//     });