<?php
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\MuestraController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\AparatoController;
use App\Models\Aparato;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\EncuestaController;
use App\Http\Controllers\QuestionController;
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
Auth::routes();
Route::get('/', function () {
    return view('welcome');
});




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');


Route::get('/muestra', [App\Http\Controllers\MuestraController::class, 'index'])->name('muestra.index');

Route::get('/marca', [App\Http\Controllers\MarcaController::class, 'index'])->name('marca.index');

Route::get('/aparato', [App\Http\Controllers\AparatoController::class, 'index'])->name('aparato.index');

Route::get('/menu', [App\Http\Controllers\MenuController::class, 'index'])->name('menu.index');

Route::get('/encuesta', [App\Http\Controllers\QuestionController::class, 'index'])->name('encuesta.index');

Route::get('/archivos', [App\Http\Controllers\ArchivosController::class, 'index'])->name('archivos.index');

// Password Reset Routes...
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');


Route::resource('users', UserController::class);

Route::resource('muestras', MuestraController::class);
Route::middleware(['auth'])->group(function () {
    Route::resource('muestras', MuestraController::class)->except(['index']); // Excluir el índice del middleware
});

// Rutas para mostrar el catálogo
Route::get('muestras', [MuestraController::class, 'index'])->name('muestras.index');

// Rutas protegidas solo para administradores
Route::middleware(['admin'])->group(function () {
    Route::resource('muestras', MuestraController::class)->only(['create', 'store', 'edit', 'update', 'destroy']);
});

Route::get('marcas', [MarcaController::class, 'index'])->name('marcas.index');
Route::post('marcas', [MarcaController::class, 'store'])->name('marcas.store');
Route::delete('marcas/{marca}', [MarcaController::class, 'destroy'])->name('marcas.destroy');

Route::resource('aparatos', AparatoController::class);

Route::resource('menus', MenuController::class);


Route::group(['middleware' => ['role:admin,supervisor']], function () {
    Route::get('/menus/create', [MenuController::class, 'create'])->name('menus.create');
    Route::post('/menus', [MenuController::class, 'store'])->name('menus.store');
    Route::get('/menus/{menu}/edit', [MenuController::class, 'edit'])->name('menus.edit');
    Route::put('/menus/{menu}', [MenuController::class, 'update'])->name('menus.update');
    Route::delete('/menus/{menu}', [MenuController::class, 'destroy'])->name('menus.destroy');
});

// Ruta para que todos los usuarios puedan ver los menús
Route::get('/menus', [MenuController::class, 'index'])->name('menus.index');

Route::resource('questions', QuestionController::class);
Route::post('questions/{question}/answer', [QuestionController::class, 'answer'])->name('questions.answer');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('questions', QuestionController::class);
});

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('questions/create', [QuestionController::class, 'create'])->name('questions.create');
    Route::post('questions', [QuestionController::class, 'store'])->name('questions.store');
    Route::get('questions/{question}/edit', [QuestionController::class, 'edit'])->name('questions.edit');
    Route::put('questions/{question}', [QuestionController::class, 'update'])->name('questions.update');
    Route::delete('questions/{question}', [QuestionController::class, 'destroy'])->name('questions.destroy');
});
