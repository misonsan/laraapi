<?php



use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;     // inserito da Moreno per eliminare il problema
use Illuminate\Support\Facades\Route;

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

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::resource('users', 'UsersController');

Route::get('/home', 'HomeController@index')->name('home');
// funzionano entrambe
Route::resource('users', 'App\Http\Controllers\UsersController');
Route::resource('aaaa', UsersController::class);
