<?php

use App\Lending;
use App\Member;
use App\Movie;
use Illuminate\Database\Seeder;

class LendingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lending1 = [
            'movie_id' => 1,
            'member_id' => 1,
            'lending' => '2021-07-19',
            'returned' => '2021-07-21',
            'lateness_charge' => null
        ];

        Lending::create($lending1);

        $lending1 = [
            'movie_id' => 2,
            'member_id' => 2,
            'lending' => '2021-07-20',
            'returned' => null,
            'lateness_charge' => null
        ];

        Lending::create($lending1);
    }
}
