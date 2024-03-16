<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; 
use Illuminate\Support\Facades\Storage; 
use App\Models\Service; 
use Illuminate\Support\Facades\Auth;


//ログイン関連のコントローラー
class AuthController extends Controller
{

    //ログイン画面の表示
    public function showLogin()
    {
        return view('auth.login');
    }


    //ログイン機能
    public function login(Request $request)
    {
        // バリデーションルールの適用
        $rules = [
            'email' => 'required|email|max:255', // 'email'のバリデーションルール追加
            'password' => ['required', 'min:8', 'regex:/[a-z]/', 'regex:/[A-Z]/', 'regex:/[0-9]/'],
        ];
    
        $messages = [
            'email.required' => 'メールアドレスを入力してください。',
            'email.email' => '正しいメールアドレス形式で入力してください。',
            'password.required' => 'パスワードを入力してください。',
            'password.min' => 'パスワードは最低8文字必要です。',
            'password.regex' => '',
        ];
    
        // バリデーションの実行
        $credentials = $request->validate($rules, $messages);
        
        // エラーなし
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('manage'));
        }
    
        // エラーあり
        return back()->withErrors([
            'email' => 'メールアドレスまたはパスワードが正しくありません。',
        ]);
    }

    public function logout(Request $request)
{
    Auth::logout(); // ログアウト処理
    $request->session()->invalidate(); // セッションの無効化
    $request->session()->regenerateToken(); // セッションのトークン再生成
    return redirect('/'); // ログアウト後にリダイレクトする先を指定
}



}

