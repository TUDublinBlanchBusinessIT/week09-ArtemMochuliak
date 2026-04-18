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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('members', ['uses' => 'MemberController@showAllMembers']);
    $router->get('members/{id}', ['uses' => 'MemberController@showOneMember']);
    $router->post('members', ['uses' => 'MemberController@create']);
    $router->put('members/{id}', ['uses' => 'MemberController@update']);
    $router->delete('members/{id}', ['uses' => 'MemberController@delete']);

    
    $router->get('member/{id}/bookings', [
        'uses' => 'MemberController@showMemberBookings'
    ]);
});

