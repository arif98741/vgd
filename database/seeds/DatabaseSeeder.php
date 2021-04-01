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
            '1' => 'দুরমুঠ',
            '2' => 'কুলিয়া',
            '3' => 'মাহমুদপুর',
            '4' => 'নাংলা',
            '5' => 'নয়ানগর',
            '6' => 'আদ্রা',
            '7' => 'চরবানিপাকুরিয়া',
            '8' => 'ফুলকোচা',
            '9' => 'ঘোষেরপাড়া',
            '10' => 'ঝাউগড়া',
            '11' => 'শ্যামপুর',
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
