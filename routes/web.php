<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DemitirFuncionario;
use App\Http\Controllers\FuncionarioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded within the "web" middleware group which includes
| sessions, cookie encryption, and more. Go build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('clients', [ClienteController::class, 'index'])->name('clients.index');
Route::get('clients/create', [ClienteController::class, 'create'])->name('clients.create');
Route::post('clients', [ClienteController::class, 'store'])->name('clients.store');
Route::get('clients/{client}/edit', [ClienteController::class, 'edit'])->name('clients.edit');
Route::put('clients/{client}', [ClienteController::class, 'update'])->name('clients.update');
Route::delete('clients/{client}', [ClienteController::class, 'destroy'])->name('clients.destroy');

Route::resource('funcionarios', FuncionarioController::class);
Route::patch('funcionarios/{funcionario}/demissao', DemitirFuncionario::class)->name('funcionarios.demitir');

Route::resource('projetos', FuncionarioController::class);
