<?php
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

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AtividadeController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\EntregaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard principal
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// Perfil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Painel do aluno
Route::middleware(['auth', 'is_aluno'])->group(function () {
    Route::get('/painel-aluno', function () {
        return view('painel.aluno');
    });
});

// Painel do professor
Route::middleware(['auth', 'is_professor'])->group(function () {
    Route::get('/painel-professor', function () {
        return view('painel.professor');
    });
});

// Rotas só para professor
Route::middleware(['auth', 'is_professor'])->group(function () {
    Route::resource('atividades', AtividadeController::class);
    Route::get('/alunos', [AlunoController::class, 'index'])->name('alunos.index');
    Route::post('/notas', [NotaController::class, 'store'])->name('notas.store');
});

// Rotas só para aluno
Route::middleware(['auth', 'is_aluno'])->group(function () {
    Route::get('/minhas-atividades', [EntregaController::class, 'index'])->name('entregas.index');
    Route::post('/minhas-atividades/{id}/responder', [EntregaController::class, 'store'])->name('entregas.store');
});

require __DIR__.'/auth.php';
















// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// // Apenas alunos
// Route::middleware(['auth', 'tipo:aluno'])->group(function () {
//     Route::get('/painel-aluno', function () {
//         return view('painel.aluno');
//     });
// });

// // Apenas professores
// Route::middleware(['auth', 'tipo:professor'])->group(function () {
//     Route::get('/painel-professor', function () {
//         return view('painel.professor');
//     });
// });

// // Acesso comum a todos autenticados


require __DIR__.'/auth.php';
