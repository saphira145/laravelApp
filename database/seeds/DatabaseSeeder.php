<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $faker = Faker\Factory::create();
        // $this->call(UserTableSeeder::class);
        for ($i=0; $i < 500; $i++) {
            DB::table('students')->insert([
                'student_code' => $faker->numberBetween(0,999999),
                'fullname'     => $faker->name,
                'birthday'      => $faker->date(),
                'sex'           => $faker->city,
                'address'       => $faker->address
            ]);
        }
        Model::reguard();
    }
}
