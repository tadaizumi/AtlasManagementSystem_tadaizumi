<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Users\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id' => 1,
            'over_name' => '山田',
            'under_name' => '太郎',
            'over_name_kana' => 'ヤマダ',
            'under_name_kana' => 'タロウ',
            'mail_address' => 'taro123@example.com',
            'sex' => '1',
            'birth_day' => '2000-01-01',
            'role' => '2',
            'password' => 'taroTa123',
        ]);

        User::create([
            'id' => 2,
            'over_name' => '山田',
            'under_name' => '花子',
            'over_name_kana' => 'ヤマダ',
            'under_name_kana' => 'ハナコ',
            'mail_address' => 'hanako123@example.com',
            'sex' => '2',
            'birth_day' => '2000-02-02',
            'role' => '2',
            'password' => 'hanakoHa123',
        ]);

        User::create([
            'id' => 3,
            'over_name' => '川田',
            'under_name' => 'なつ',
            'over_name_kana' => 'カワタ',
            'under_name_kana' => 'ナツ',
            'mail_address' => 'natsu123@example.com',
            'sex' => '2',
            'birth_day' => '2000-03-03',
            'role' => '2',
            'password' => 'natsuNa123',
        ]);

    }
}
