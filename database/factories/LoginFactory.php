<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Login;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

$factory->define(Login::class, function (Faker $faker) {
    $password = 'password1'; // テスト用パスワードを変数に格納
    // バリデーションルールに適合するようにユーザー名を生成
    $user_name = $faker->lexify('????????').$faker->numerify('##');
    return [
        'user_name' => $user_name,
        'password' => Hash::make($password), // パスワードをハッシュ化して保存
    ];
});





    
