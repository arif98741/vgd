<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->unionInsert();
        $this->call(UserSeeder::class);
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

        foreach ($unions as $key => $union) {
            DB::table('unions')
                ->insert([
                    'id' => $key,
                    'union_name' => $union,
                    'amount' => rand(50, 60),
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                ]);
        }

    }
}
