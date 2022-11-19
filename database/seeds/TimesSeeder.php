<?php

use App\Models\Time;
use Illuminate\Database\Seeder;

class TimesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $times = [
            '5:00 pm','5:15 pm','5:30 pm','5:45 pm',
            '6:00 pm','6:15 pm','6:30 pm','6:45 pm',
            '7:00 pm','7:15 pm','7:30 pm','7:45 pm',
            '8:00 pm','8:15 pm','8:30 pm','8:45 pm',
            '9:00 pm','9:15 pm','9:30 pm','9:45 pm',
            '10:00 pm','10:15 pm','10:30 pm','10:45 pm',
            '11:00 pm','11:15 pm','11:30 pm','11:45 pm',
            '12:00 am','12:15 am','12:30 am','12:45 am',
            '1:00 am','1:15 am','1:30 am','1:45 am',
            '2:00 am'
        ];

        foreach ($times as $time) {
            Time::create([
                'time' =>$time
            ]);
        }
    }
}
