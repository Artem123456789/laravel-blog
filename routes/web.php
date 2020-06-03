<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::post('/addComment/{post}', 'PostController@addComment')->name('addComment');

Route::resource('posts', 'PostController');
