<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index', [
        'name' => 'Bishoy',
        'age' => 25,
        'work' => 'Yum!'
    ]);
});

Route::get('/hello', function(){
    return 'Hello';
})->name('hello');

//Route::redirect('/hallo', '/hello', 301);
Route::get('/hallo', function(){
    return redirect()->route('hello');
});

Route::get('users/{id}', function ($id) {
    return 'user Id is  '.$id ;
});

Route::fallback(function(){
    return 'Still Got Somewhere!';
});

//GET
//POST
//PUT
//DELETE