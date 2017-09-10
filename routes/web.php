<?php
use Illuminate\Http\Request;

Route::get('/', function (Request $request) {
    return view('welcome',['user'=>$request->cookie('name')]);
});
Route::get('/list', function (Request $request) {
    return view('list',['user'=>$request->cookie('name')]);
});

Route::resource('/api/movies', 'MovieController');

Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');
