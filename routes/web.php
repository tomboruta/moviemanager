<?php

Route::get('/', function () {
    return view('welcome');
});
Route::get('/list', function () {
    return view('list');
});

Route::resource('/api/movies', 'MovieController');

Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');
