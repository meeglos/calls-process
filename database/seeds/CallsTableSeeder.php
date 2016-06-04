<?php

use Calls\Entities\Call;
use Illuminate\Database\Seeder;
class CallsTableSeeder extends BaseSeeder
{
    public function getModel()
    {
         return new Call();
    }

    public function getDummyData(\Faker\Generator $faker, array $customValues = array())
    {
        return [
            'call_date' => $faker->dateTimeBetween($startDate = '-4 months', $endDate = 'now'),
            'client_id' => $faker->numberBetween($min = 10000000, $max = 99999000),
            'call_lapse'=> $faker->numberBetween($min = 65, $max = 700),
            'comment'   => $faker->sentence(),
            'user_id'   => $this->getRandom('User')->id
        ];
    }

    public function run()
    {
        $this->createMultiple(546);
    }
}
