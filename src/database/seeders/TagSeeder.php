<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory;


class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 一旦テーブル削除
        // DB::table('tags')->delete();

        DB::table('tags')->insert([
            [
                'name' => 'PHP'
            ],
            [
                'name' => 'Laravel'
            ],
            [
                'name' => 'Ruby'
            ],
            [
                'name' => 'Rails'
            ],
            [
                'name' => 'Java'
            ]
            ]);
    }
    //     // faker使う
    //     $faker = Factory::create('ja_JP');

    //     // DB::table('tags')->insert([
    //     //     'name' => Str::random(5),
    //     // ]);
    //     for ($i = 0; $i < 20; $i++) {
    //         \App\Models\Tag::create([
    //             'name' => $faker->name(),
    //         ]);
    //     }
    // }
}
