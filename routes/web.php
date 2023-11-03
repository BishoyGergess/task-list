<?php
use App\Models\Task;
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
        'tasks'=> Task::all()
    ]);
})->name('tasks.index');

Route::get('/tasks/completed', function () {
    return view('index', [
        'tasks'=> Task::latest()->where('completed', true)->get()
    ]);
})->name('tasks.completed');

Route::view('/tasks/create', 'create')
    ->name('tasks.name');

Route::get('/tasks/{id}/edit', function ($id) {
   return view('edit', ['task' => Task::findOrFail($id)]);
})->name('tasks.edit');

Route::get('/tasks/{id}', function ($id) {
    return view('show', ['task' => Task::findOrFail($id)]);
 })->name('tasks.show');

Route::post('/tasks', function (Request $request) {
    $data = $request->validate([
        'title'=>'required|min:3|max:255',
        'description'=>'required',
        'long_description'=>'required',
    ]);
    
    $task = new Task;
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];

    $task->save();

    return redirect()->route('tasks.show',['id'=>$task->id])
    ->with('success','Task was created sucessfully!');
})->name('tasks.store');

Route::put('/tasks/{id}', function ($id, Request $request) {
    $data = $request->validate([
        'title'=>'required|min:3|max:255',
        'description'=>'required',
        'long_description'=>'required',
    ]);
    
    $task = Task::findOrFail($id);
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];

    $task->save();

    return redirect()->route('tasks.show',['id'=>$task->id])
    ->with('success','Task was updated sucessfully!');
})->name('tasks.update');


//Future Ref
//Route::fallback(function(){
//    return 'Still Got Somewhere!';
//});

//GET
//POST
//PUT
//DELETE