<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        // dd(CitySeeder::class);

        $this->call(CitySeeder::class);
        $this->call(DoctorSeeder::class);
        $this->call(PatientSeeder::class);
    }
}
