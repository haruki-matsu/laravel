<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Mail\ThankYouMail;


//問い合わせフォーム関連のコントローラー
class ContactController extends Controller
{

//ユーザーからの入力を確認し、セッションに保存して確認ページを表示する
    public function confirm(Request $request) {
        //バリデーション
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email',
            'confirm_email' => 'required|email|same:email',
            'category' => 'required',
            'message' => 'required|string|max:1000',
        ], [
            'name.required' => '氏名は必須です',
            'name.string' => '氏名は文字で入力してください',
            'name.max' => '氏名は50文字以内で入力してください',
            'email.required' => 'メールアドレスは必須です',
            'email.email' => '有効なメールアドレスを入力してください',
            'confirm_email.required' => '確認用メールアドレスは必須です',
            'confirm_email.email' => '有効な確認用メールアドレスを入力してください',
            'confirm_email.same' => 'メールアドレスと確認用メールアドレスは一致させてください',
            'category.required' => 'カテゴリーを選択してください',
            'message.required' => 'メッセージは必須です',
            'message.string' => 'メッセージは文字で入力してください',
            'message.max' => 'メッセージは1000文字以内で入力してください',
        ]);

        //入力データとトークンをセッションに保存
        $data = $request->all();
        $request->session()->put('data', $data);
        $request->session()->put('form_token', uniqid('', true));

        //確認ページの表示
        return view('contact.confirm', compact('data'));
    }


//入力されたデータをメール送信し、完了ページにリダイレクトする
    public function sendMail(Request $request) {
        //入力データとトークンをセッションに保存
        $data = $request->session()->get('data', []);
        $token = $request->session()->get('form_token');
    
        //データが空でないかのチェック
        if (empty($data)) {
            \Log::error('Session data is empty.');
            return redirect('/complete')->with('error_dataNull', '入力データが見つかりません。');
        }
    
        // 二重送信のチェック（トークンが空かどうか）
        if (is_null($token)) {
            \Log::error('Form token is missing or has already been used.');
            return redirect('/complete')->with('error_doubleSend', 'フォームは既に送信されています。');
        }

        $request->session()->forget('form_token');


        try {
            // ユーザーへのメール送信
            Mail::to($data['email'])->send(new ThankYouMail($data));
    
            // 企業側への連絡メール送信
            $businessEmail = 'haruharo.ee@gmail.com'; // 企業のメールアドレス（自分メールアドレス)
            Mail::to($businessEmail)->send(new ContactMail($data));
    
            // 成功メッセージを持って完了ページへリダイレクト
            return redirect('/complete')->with('success', 'メールを送信しました。');
        } catch (\Exception $e) {
            // ログにエラーを記録
            \Log::error('Mail send failed: ' . $e->getMessage());
    
            // エラーメッセージを持って完了ページへリダイレクト
            return redirect('/complete')->with('error_send', 'メールの送信に失敗しました。');
        }
    }
    

}