<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        //  $this->call(UnionSeeder::class);
        $this->unionInsert();
    }

    private function unionInsert()
    {

        $unions = [ //git hub edit here
            '1' => 'নাংলা',
            '1' => 'নাংলা',
            '1' => 'নাংলা',
            '1' => 'নাংলা',
            '1' => 'নাংলা',
            '1' => 'নাংলা',
            '1' => 'নাংলা',
            '1' => 'নাংলা',
            '1' => 'নাংলা',
            '1' => 'নাংলা',
        ];



        foreach ($unions as $) {
           /* DB::table('unions')
                ->insert([
                    'id' => 'নাংলা'
                ])*/
        }
        /*
        DB::table('unions')
            ->insert(
                [
                    'union_name' => 'দুরমুঠ',
                ],
                [
                    'union_name' => 'কুলিয়া',
                ],
                [
                    'union_name' => 'নাংলা',
                ],
                [
                    'union_name' => 'মাহমুদপুর',
                ],
                [
                    'union_name' => 'নয়ানগর',
                ],
                [
                    'union_name' => 'আদ্রা',
                ],
                [
                    'union_name' => 'চরবানিপাকুরিয়া',
                ],
                [
                    'union_name' => 'ফুলকোচা',
                ],
                [
                    'union_name' => 'ঘোষেরপাড়া',
                ],
                [
                    'union_name' => 'ঝাউগড়া',
                ],
                [
                    'union_name' => 'শ্যামপুর',
                ]

            );*/
    }
}
