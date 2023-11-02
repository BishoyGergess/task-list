<?php

use Illuminate\Http\Response;
use Illuminate\Http\Request;
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

Route::get('/', function (){
  return redirect()->route('tasks.index');

});

Route::get('/tasks', function () {
    return view('index', [
        'tasks'=> \App\Models\Task::all()
    ]);
})->name('tasks.index');

Route::get('/tasks/completed', function () {
    return view('index', [
        'tasks'=> \App\Models\Task::latest()->where('completed', true)->get()
    ]);
})->name('tasks.completed');

Route::view('/tasks/create', 'create')
    ->name('tasks.name');

Route::get('/tasks/{id}', function ($id) {
   return view('show', ['task' => \App\Models\Task::findOrFail($id)]);
})->name('tasks.show');

Route::post('/tasks', function (Request $request) {
    dd($request->all());
})->name('tasks.store');


//Future Ref
//Route::get('/hello', function(){
//    return 'Hello';
//})->name('hello');

//Route::redirect('/hallo', '/hello', 301);
//Route::get('/hallo', function(){
 //   return redirect()->route('hello');
//});

//Route::get('users/{id}', function ($id) {
//    return 'user Id is  '.$id ;
//});

Route::fallback(function(){
    return 'Still Got Somewhere!';
});

//GET
//POST
//PUT
//DELETE