<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Route::view('/collection', 'collection');
Route::view('/file', 'file');
Route::view('/password', 'password');

Route::post('/collection', function (Request $request) {
    $request->validate([
        'email'   => ['required', 'array', 'min:4'],
        'email.*' => ['email'],
    ]);

    return view('collection');
});
