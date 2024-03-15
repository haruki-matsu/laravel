<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


//topページの表示
Route::get('/', [ServiceController::class, 'index'])->name('index');



//メール送信関連

//入力フォーム確認画面に移動
Route::post('/confirm', [ContactController::class, 'confirm'])->name('confirm'); 
//メール送信機能
Route::post('/send', [ContactController::class, 'sendMail'])->name('send'); //メール送信
//メール送信完了画面に移動
Route::get('/complete', function () {
    return view('contact.complete');
})->name('complete');



//ログインページ関連

//ログインページに移動
Route::get('/show_login', [AuthController::class, 'showLogin'])->name('showLogin');
//ログイン機能
Route::post('/login', [AuthController::class, 'login'])->name('login');
//管理画面に移動
Route::get('/manage', function () {
    return view('admin.manage');
})->name('manage');



//サービス管理関連

//サービス登録
Route::post('/store', [ServiceController::class, 'store'])->name('form.store');
//サービス登録完了画面に移動
Route::get('/registration-done', function () {
    return view('admin.registration_done');
})->name('registration.done');

//サービス削除
Route::delete('/service/{id}', [ServiceController::class, 'destroy'])->name('delete');
//サービス削除完了画面に移動
Route::get('/delete-done', function () {
    return view('admin.delete_done');
})->name('delete.done');


//編集画面に移動(データも移動)
Route::get('/edit_item/{id}', [ServiceController::class, 'edit'])->name('edit');
//サービスの更新
Route::post('update/{id}', [ServiceController::class, 'update'])->name('update');
//サ０ビス更新完了画面に移動
Route::get('/edit-done', function () {
    return view('admin.edit_done');
})->name('edit.done');






Route::get('/manage', [ServiceController::class, 'getAfile'])->name('manage');










