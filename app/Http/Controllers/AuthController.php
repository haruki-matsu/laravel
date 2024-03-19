<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; 
use Illuminate\Support\Facades\Log;
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
        $rules = [
            'user_name' => 'required|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]+$/',
            'password' => 'required|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]+$/',
        ];
    
        $messages = [
            'user_name.required' => 'ユーザー名は必須です。',
            'user_name.regex' => 'ユーザー名は半角英数字で入力してください。',
            'password.required' => 'パスワードは必須です。',
            'password.regex' => 'パスワードは半角英数字で入力してください。', 
        ];
    
        // バリデーションの実行
        $validatedData = $request->validate($rules, $messages);

        Log::info('Credentials:', $validatedData);
    
        // ログイン試行時に 'email' の代わりに 'username' を使用
        $credentials = [
            'user_name' => $request->user_name,
            'password' => $request->password,
        ];
    
        // エラーなし
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('manage'));
        }

        // エラーあり
        return back()->withErrors([
            'user_name' => 'ユーザー名またはパスワードが正しくありません。',
        ]);
    }
    
    public function logout(Request $request)
    {
        Auth::logout(); // ログアウト処理
        $request->session()->invalidate(); // セッションの無効化
        $request->session()->regenerateToken(); // セッションのトークン再生成
        return redirect('/'); 
    }
}
