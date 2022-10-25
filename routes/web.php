<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Http\Request;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});









Route::get('/saludar',function(){
    return 'Hola mundo!';
})->name('apiLibros.saludar');

Route::get('/v1/libros', [App\Http\Controllers\librosController::class, 'obtenerLibros'])
    ->name('apiLibros.listar');

Route::get('/v1/libros/{id}',[App\Http\Controllers\librosController::class, 'obtenerLibro'])
    ->name('apiLibros.obtener');

Route::get('/v2/libros', [App\Http\Controllers\librosController::class, 'obtenerLibrosv2'])
    ->name('apiLibros.listarv2');
/*
Route::post('ejem', function(Request $request){
    $name = $request->input('name');
    $apellido = $request->input('apellido');
    $genero = $request->input('genero');
});
*/
