<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\TaskController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*--- task route ---*/
Route::group(['middleware' => ['web']], function(){
    Route::get('/', function(){
        return view ('welcome');
    }) -> middleware('guest');
    Route::get('/tasks', [TaskController::class, 'index']);
    Route::post('/task', [TaskController::class, 'store']);
    Route::get('/task/edit/{id}', [TaskController::class, 'edit']);
    Route::post('/task/update/{id}', [TaskController::class, 'update']);
    Route::delete('/task/{id}', [TaskController::class, 'delete']);
    Route::get('/search', [TaskController::class, 'search'])->name('search');
    /*Route::get('/search',function(){

    })->name('search');*/
}); 


