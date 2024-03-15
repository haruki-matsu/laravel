<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    // テーブル名の指定
    protected $table = 'service'; // このモデルが対応するデータベーステーブル名

    // 代入可能な属性
    protected $fillable = [
        'line_up',
        'service_name',
        'price',
        'img_path' // 画像ファイル名を保存するカラム名を追加
    ];

    // ここにモデルの追加のメソッドやロジックを定義できます
}


