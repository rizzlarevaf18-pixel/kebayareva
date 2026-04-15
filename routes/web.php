<?php

use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\FineController;
use App\Http\Middleware\RoleMiddleware;

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
    Route::get('/transactions/receipt/{id}', [TransaksiController::class, 'receipt'])->name('transactions.receipt');
    
    // ============ TRANSACTIONS ROUTE (alias untuk transaksi) ============
    Route::get('/transactions', [TransaksiController::class, 'index'])->name('transactions');
    
    // ============ PEMINJAMAN (LOAN) ROUTES ============
    Route::prefix('loans')->group(function () {
        Route::get('/', [LoanController::class, 'loans'])->name('pinjamBarang');
        Route::post('/borrow', [LoanController::class, 'borrow'])->name('items.borrow');
        Route::post('/{id}/approve', [LoanController::class, 'approve'])->name('loans.approve');
        Route::post('/{id}/reject', [LoanController::class, 'reject'])->name('loans.reject');
        Route::post('/{id}/take', [LoanController::class, 'take'])->name('loans.take');
        Route::post('/{id}/return', [LoanController::class, 'returnLoan'])->name('loans.return');
        Route::get('/{id}/receipt', [LoanController::class, 'getReceipt'])->name('loans.receipt');
    });
    
    // ============ FINE ROUTES (Denda) ============
    Route::prefix('fines')->group(function () {
        Route::post('/{id}/pay', [FineController::class, 'pay'])->name('fines.pay');
        Route::get('/{id}/detail', [FineController::class, 'detail'])->name('fines.detail');
        Route::post('/{id}/waive', [FineController::class, 'waive'])->name('fines.waive');
    });
    
    // ============ TRANSACTION / RETURN HISTORY ROUTES ============
    Route::prefix('transaksi')->group(function () {
        // Halaman riwayat pengembalian
        Route::get('/return-history', [TransaksiController::class, 'returnHistory'])->name('transaksi.return-history');
        
        // Proses pengembalian barang
        Route::post('/return/{loanId}', [TransaksiController::class, 'returnItem'])->name('transaksi.return');
        
        // Cetak struk pengembalian
        Route::get('/struk/{loanId}', [TransaksiController::class, 'printStruk'])->name('transaksi.struk');
        
        // API endpoints (optional)
        Route::get('/api/return-history', [TransaksiController::class, 'getReturnHistoryData'])->name('api.return-history');
        Route::post('/api/calculate-fine', [TransaksiController::class, 'calculateFine'])->name('api.calculate-fine');
    });
    
    // Log Aktivitas - Semua role bisa akses
    Route::get('/logs', [LogController::class, 'index'])->name('logs');
    Route::post('/logs', [LogController::class, 'store'])->name('logs.store');
    Route::put('/logs/{user}', [LogController::class, 'update'])->name('logs.update');
    Route::delete('/logs/{user}', [LogController::class, 'destroy'])->name('logs.destroy');
    
    // ============ ITEMS ROUTES (Admin & Petugas) ============
    Route::get('/items', [ItemController::class, 'index'])->name('items');
    Route::post('/items', [ItemController::class, 'store'])->name('items.store');
    Route::put('/items/{item}', [ItemController::class, 'update'])->name('items.update');
    Route::delete('/items/{item}', [ItemController::class, 'destroy'])->name('items.destroy');
});

// ============ ADMIN ONLY ROUTES ============
Route::middleware(['auth', RoleMiddleware::class . ':admin'])->group(function () {
    // Manajemen Users - Hanya Admin
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});