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
        $gender = ['male', 'female', 'gay', 'les'];
        $faker = Faker\Factory::create();
        // $this->call(UserTableSeeder::class);
        for ($i=0; $i < 500; $i++) {
            DB::table('students')->insert([
                'student_code' => $faker->numberBetween(0,999999),
                'fullname'     => $faker->name,
                'birthday'      => $faker->date(),
                'sex'           => array_rand($gender),
                'address'       => $faker->address,
                'updated_at'  => $faker->date(),
                'created_at'  => $faker->date()
            ]);
        }
        Model::reguard();
    }
}
