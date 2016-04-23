<?php

use Faker\Generator;
use Calls\Entities\User;
use Faker\Factory as Faker;

class UsersTableSeeder extends BaseSeeder
{
    public function getModel()
    {
        return new User();
    }

    public function getDummyData(Generator $faker, array $customValues = array())
    {
        return [
            'name' => $faker->name,
            'email' => $faker->email,
            'password' => bcrypt('secret'),
            'role' => 'user'
        ];
    }
    public function run()
    {
        $this->createAdmin();

        $this->createMultiple(10);
    }

    /**
     * Create admin function
     */
    public function createAdmin()
    {
        User::create([
            'name' => 'Miguel Rodriguez',
            'email' => 'miguel@rodriguez.me',
            'password' => bcrypt('admin'),
            'role' => 'admin'
        ]);
    }

}