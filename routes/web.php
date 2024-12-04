<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExpenseFormController;
use App\Http\Controllers\ExpenseMenuController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'show_home'])->middleware('auth')->name('home');

// 経費メニュー用ルーティング
Route::get('/expense-menu', [ExpenseMenuController::class, 'show_expense_menu'])->middleware('auth')->name('expense');

// 経費申請フォーム用ルーティング
Route::get('/expense-form', [ExpenseFormController::class, 'show_expense_form'])->middleware('auth')->name('expense.form');
Route::post('/expense-submit', [ExpenseFormController::class, 'expense_form_submit_confirm'])->middleware('auth')->name('expense.submit.confirm');

// 確認画面用ルーティング
Route::get('/expense-confirm', [ExpenseFormController::class, 'show_expense_confirm'])->middleware('auth')->name('expense.confirm');
// 経費申請確定
//APIトークン取得
Route::post('/expence-register', [ExpenseFormController::class, 'store'])->middleware('auth')->name('expence-register');
Route::get('/test_comp', function () {
    return view('test_comp');
})->name('test_comp');

//csv出力用　経費申請
Route::post('/expence_store', [ExpenseFormController::class, 'expence_store'])->middleware('auth')->name('expence-store');

//ログイン用ルーティング
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout.attempt');
//ルート記載関数
