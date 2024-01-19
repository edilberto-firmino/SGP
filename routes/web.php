<?php
use App\Http\Controllers\TreinoController;
use App\Http\Controllers\GastosController;
use App\Http\Controllers\AlimentacaoController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('treinos', TreinoController::class)->parameters(['treinos' => 'treino']);

Route::get('/gastos/create', [GastosController::class, 'create'])->name('gastos.create');
Route::post('/gastos', [GastosController::class, 'store'])->name('gastos.store');
Route::get('/gastos/download', [GastosController::class, 'download'])->name('gastos.download');
Route::get('/gastos/{id}', [GastosController::class, 'show'])->name('gastos.show');
Route::get('/gastos', [GastosController::class, 'index'])->name('gastos.index');
Route::resource('gastos', GastosController::class);

Route::get('/alimentacoes/{alimentacao}/edit', [AlimentacaoController::class, 'edit'])->name('alimentacoes.edit');
Route::put('/alimentacoes/{alimentacao}', [AlimentacaoController::class, 'update'])->name('alimentacoes.update');
Route::resource('alimentacoes', AlimentacaoController::class);
