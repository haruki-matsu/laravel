<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; 
use Illuminate\Support\Facades\Storage; 
use App\Models\Service; 






class ServiceController extends Controller
{

// 一覧の表示
    public function index()
    {
        $services = Service::all();
        return view('home.index', compact('services'));
    }



//登録ページの表示

public function store(Request $request)
{
        // バリデーションルールを定義
        $rules = [
            'line_up' => 'required|max:255',
            'service_contents' => 'required|max:255',
            'price' => 'required|numeric',
            'up_img' => 'required|image|max:5120', // 5MB
        ];
    
        // カスタムエラーメッセージを定義
        $messages = [
            'line_up.required' => 'ラインナップを入力してください。',
            'line_up.max' => 'ラインナップは255文字以内で入力してください。',
            'service_contents.required' => 'サービス内容を入力してください。',
            'service_contents.max' => 'サービス内容は255文字以内で入力してください。',
            'price.required' => '金額を入力してください。',
            'price.numeric' => '金額は数値で入力してください。',
            'up_img.required' => '画像ファイルを添付してください。',
            'up_img.image' => 'ファイルは画像である必要があります。',
            'up_img.max' => 'ファイルサイズが5MB以下の画像を使用してください。',
        ];
    
        // バリデーション実行
        $validator = Validator::make($request->all(), $rules, $messages);
    
        // バリデーションでエラーになった場合
        if ($validator->fails()) {
            return redirect()->route('registration.done')
                ->withErrors($validator);
        }
    
        // DBに登録
        try {
            $service = new Service;
            $service->line_up = $request->line_up;
            $service->service_name = $request->service_contents;
            $service->price = $request->price;
    
            if ($request->hasFile('up_img')) {
                $file = $request->file('up_img');
                $fileContent = file_get_contents($file->getRealPath());
                $fileHash = md5($fileContent);
    
                $files = Storage::disk('public')->files('uploads/');
                $exists = collect($files)->contains(function ($existingFile) use ($fileHash) {
                    $existingContent = Storage::disk('public')->get($existingFile);
                    $existingHash = md5($existingContent);
                    return $fileHash === $existingHash;
                });
    
                // 重複チェック
                if ($exists) {
                    return redirect()->route('registration.done')
                        ->withInput()
                        ->with('error', '既に同じ内容の画像が存在します。');
                }
    
                // ランダムなファイル名の生成
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $filePath = $file->storeAs('uploads', $filename, 'public');
                $service->img_path = $filePath;
            }
    
            $service->save();
    
            return redirect()->route('registration.done')->with('success', $request->line_up . ' のサービスが正常に追加されました。');
    
        } catch (\Exception $e) {
            \Log::error('サービス追加エラー: ' . $e->getMessage());
            return redirect()->route('registration.done')->with('error', 'サービスの追加中にエラーが発生しました。');
        }
    }
    



//ファイルを取得

public function getAfile()
{
    $services = Service::all(); // Serviceモデルを使用して全サービスデータを取得
    return view('admin.manage', compact('services')); // ビューにデータを渡す
}






public function edit($id)
{
    $service = Service::findOrFail($id); // IDに基づいてサービス情報を取得、存在しない場合は404
    return view('admin.edit', compact('service')); // 編集ビューにデータを渡す
}



public function update(Request $request, $id)
{
    // 以前のコード...

    $service = Service::findOrFail($id);

    // 更新前の画像のパスを保持
    $oldImagePath = $service->img_path;

    // データの更新
    $service->line_up = $request->line_up;
    $service->service_name = $request->service_contents;
    $service->price = $request->price;

    // ファイルの処理
    if ($request->hasFile('up_img')) {
        $file = $request->file('up_img');
        $filename = time() . '_' . $file->getClientOriginalName();
        $filePath = 'uploads/' . $filename;

        // Storageファサードを使ってファイルの存在をチェック
        if (\Storage::exists('public/' . $filePath)) {
            return redirect()->route('edit.done')->with('error', '同名のファイルが既に存在します。');
        }

        // ファイルを保存
        $path = $file->storeAs('public/uploads', $filename);
        $service->img_path = $filePath;

        // 新しい画像が正常に保存されたら、以前の画像を削除
        if ($oldImagePath && Storage::exists('public/' . $oldImagePath)) {
            Storage::delete('public/' . $oldImagePath);
        }
    }

    try {
        $service->save();
        return redirect()->route('edit.done')->with('success', $request->line_up . ' のサービス情報が更新されました。');
    } catch (\Exception $e) {
        // DBのエラー等
        return redirect()->route('edit.done')->with('error', 'サービスの更新中にエラーが発生しました。');
    }
}





//サービス内容の削除
public function destroy($id)
{
    try {
        $service = Service::findOrFail($id);
        $service->delete();

        //ディレクトリ内のファイル削除
        if ($service->img_path && Storage::exists('public/' . $service->img_path)) {
            Storage::delete('public/' . $service->img_path);
        }

        return redirect()->route('delete.done')->with('success', '正常に削除されました。');
    } catch (\Exception $e) {
        return redirect()->route('delete.done')->with('error', 'サービスの削除中にエラーが発生しました。');
    }
}


}