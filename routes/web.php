<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;

Route::middleware('auth')->group(function () {
    Route::get('/home', function () {
        return view('home'); 
    })->name('home');

    Route::get('/comentarios', [CommentController::class, 'index'])->name('comments.index');
    Route::post('/comentarios', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/comentarios/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

    Route::get('/certificados', function () {
        return view('certificados'); // Render the Certificados blade
    })->name('certificados.index');

    // Logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

// Redireciona para a tela de login caso o usuário não esteja autenticado
Route::get('/', function () {
    return redirect()->route('login');
})->middleware('guest'); // Middleware para garantir que apenas usuários não autenticados acessem

Route::middleware('guest')->group(function () {
    // Páginas que não exigem autenticação (ou exigem que o usuário esteja deslogado)
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);

    Route::get('senha/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('senha/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('senha/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('senha/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

    Route::get('/esqueceu-senha', function () {
        return view('esqueceu_senha');
    });

    Route::get('/registrar', function () {
        return view('registrar');
    });
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard'); // Render the admin dashboard view
    })->name('admin.dashboard');
});

Route::resource('publicacoes', PublicacaoController::class);

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/noticias', function () {
        return view('admin.noticias'); // Renderiza a página de Gerenciar Notícias
    })->name('admin.noticias');

    Route::post('/admin/noticias', [PublicacaoController::class, 'store'])->name('publicacoes.store');
});