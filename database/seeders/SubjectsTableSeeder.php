<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Users\Subjects;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subjects::create([
            'id' => 1,
            'subject' => '国語',
        ]);

        Subjects::create([
            'id' => 2,
            'subject' => '数学',
        ]);

        Subjects::create([
            'id' => 3,
            'subject' => '英語',
        ]);

    }
}
