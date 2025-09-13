<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnidadeCustodiadoraController;
use App\Http\Controllers\MunicipioCustodiadoraController; // Exemplo para outro controller

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
    return view('home'); // Página inicial (poderia ser o dashboard ou um "main" vazio)
});

// Rotas para Unidade de Custódia (exemplo completo de CRUD)
Route::prefix('unidade-custodia')->group(function () {
    Route::get('/', [UnidadeCustodiadoraController::class, 'showForm'])->name('unidade.form'); // Exibe o formulário
    Route::post('/search', [UnidadeCustodiadoraController::class, 'search'])->name('unidade.search'); // Rota para busca [2.3.i]
    Route::post('/store', [UnidadeCustodiadoraController::class, 'store'])->name('unidade.store'); // Salva ou atualiza [2.3.iv]
    Route::delete('/{id}', [UnidadeCustodiadoraController::class, 'destroy'])->name('unidade.destroy'); // Deleta
    // Adicionar rota para listagem completa se necessário: Route::get('/list', [UnidadeCustodiadoraController::class, 'index'])->name('unidade.index');
});

// Exemplo de rota para Município de Custódia (o ideal é ter um prefixo e grupo para cada CRUD)
Route::prefix('municipio-custodia')->group(function () {
    Route::get('/', [MunicipioCustodiadoraController::class, 'showForm'])->name('municipio.form');
    Route::post('/search', [MunicipioCustodiadoraController::class, 'search'])->name('municipio.search');
    Route::post('/store', [MunicipioCustodiadoraController::class, 'store'])->name('municipio.store');
    // ... e assim por diante para todos os 9 itens do menu [2.1]
});