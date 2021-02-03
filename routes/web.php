<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/scoreboards', 'ScoreboardsController@index');

$router->group(['middleware' => 'auth'], function () use ($router) {


    $router->group(['prefix' => 'users'], function () use ($router) {

        $router->post('/', 'UsersController@store');
        $router->put('/{id}', 'UsersController@update');
        $router->get('/{userId}/point', 'UserPointsController@show');

        $router->group(['prefix' => "{userId}/submissions"], function () use ($router) {

            $router->get('/', 'SubmissionsController@index');
            $router->get('/{id}', 'SubmissionsController@show');
            $router->post('/', 'SubmissionsController@store');

        });

    });

    $router->group(['prefix' => 'words'], function () use ($router) {

        $router->get('/', 'WordsController@index');
        $router->get('/{id}', 'WordsController@show');
        $router->post('/', 'WordsController@store');
        $router->put('/{id}', 'WordsController@update');
        $router->delete('/{id}', 'WordsController@destroy');

    });

    $router->group(['prefix' => '/questions'], function () use ($router) {

        $router->get('/{id}', 'QuestionsController@show');

    });

    $router->group(['prefix' => '/new-questions'], function () use ($router) {

        $router->get('/', 'QuestionGeneratorsController@generate');

    });

});

$router->get('/', function () use ($router) {
    return $router->app->version();
});
