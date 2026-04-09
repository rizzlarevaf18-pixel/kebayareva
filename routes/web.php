<?php

use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\TransactionController;

// ============ ROOT REDIRECT ============
Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
});

// ============ GUEST ROUTES ============
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

// ============ AUTH ROUTES ============
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // ============ PEMINJAMAN (LOAN) ROUTES ============
    Route::prefix('loans')->group(function () {
        Route::get('/', [LoanController::class, 'loans'])->name('pinjamBarang');
        Route::post('/borrow', [LoanController::class, 'borrow'])->name('items.borrow');
        Route::post('/{id}/return', [LoanController::class, 'returnLoan'])->name('loans.return');
        Route::get('/{id}/receipt', [LoanController::class, 'getReceipt'])->name('loans.receipt');
        Route::post('/{id}/approve', [LoanController::class, 'approve'])->name('loans.approve');
        Route::post('/{id}/reject', [LoanController::class, 'reject'])->name('loans.reject');
        Route::post('/{id}/take', [LoanController::class, 'take'])->name('loans.take');
    });
    
    // ============ LOG ROUTES ============
    Route::prefix('logs')->group(function () {
        Route::get('/', [LogController::class, 'index'])->name('logs');
        Route::delete('/{id}', [LogController::class, 'destroy'])->name('logs.delete');
    });
    
    // ============ ITEMS ROUTES (LENGKAP) ============
    Route::get('/items', [ItemController::class, 'index'])->name('items');
    Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');
    Route::post('/items', [ItemController::class, 'store'])->name('items.store');
    Route::get('/items/{id}/edit', [ItemController::class, 'edit'])->name('items.edit');
    Route::put('/items/{id}', [ItemController::class, 'update'])->name('items.update');
    Route::delete('/items/{id}', [ItemController::class, 'destroy'])->name('items.delete');

    Route::match(['get', 'post', 'put', 'delete'], '/items-handle/{id?}', [ItemController::class, 'handle'])->name('items.handle');
    
    // ============ TRANSACTION ROUTES (TAMBAHKAN INI) ============
    Route::prefix('transactions')->group(function () {
        Route::get('/', [TransactionController::class, 'index'])->name('transactions');
        Route::post('/', [TransactionController::class, 'store'])->name('transactions.store');
        Route::get('/{id}', [TransactionController::class, 'show'])->name('transactions.show');
        Route::get('/{id}/struk', [TransactionController::class, 'struk'])->name('transactions.receipt');
        Route::delete('/{id}', [TransactionController::class, 'destroy'])->name('transactions.destroy');
        Route::put('/{id}/cancel', [TransactionController::class, 'cancel'])->name('transactions.cancel');
    });
});

// ============ ADMIN ONLY ROUTES ============
Route::middleware(['auth', RoleMiddleware::class . ':admin'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.delete');
});