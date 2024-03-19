<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


//topページの表示
Route::get('/', [ServiceController::class, 'index'])->name('index');



//メール送信関連

//入力フォームの確認画面に移動
Route::post('/confirm', [ContactController::class, 'confirm'])->name('confirm'); 
//メールの送信
Route::post('/send', [ContactController::class, 'sendMail'])->name('send'); 
//メール送信完了画面に移動
Route::get('/complete', function () {
    return view('contact.complete');
})->name('complete');



//ログイン関連

//ログインページに移動
Route::get('/login', function () {
    if (Auth::check()) {
        return redirect()->route('manage'); //ログインしている場合
    }
    return view('auth.login'); //ログインしていない場合
})->name('showLogin');
//ログイン
Route::post('/login', [AuthController::class, 'login'])->name('login');
//ログアウト
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');




//管理画面関連

//タイムアウト時にログイン画に移動
Route::middleware(['auth', 'session.timeout'])->group(function () {
 
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

//編集画面に移動
Route::get('/edit_item/{id}', [ServiceController::class, 'edit'])->name('edit');
//サービスの更新
Route::post('update/{id}', [ServiceController::class, 'update'])->name('update');
//サ-ビス更新完了画面に移動
Route::get('/edit-done', function () {
    return view('admin.edit_done');
})->name('edit.done');

//管理画面に移動
Route::get('/manage', [ServiceController::class, 'getAfile'])->name('manage');

});







