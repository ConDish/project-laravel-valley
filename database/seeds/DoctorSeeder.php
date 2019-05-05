<?php
use App\Models\Doctor;
use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\DB;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Doctor::create([
            'name' => 'Arturo'
        ]);

        Doctor::create([
                'name' => 'Jaun',
        ]);
    }
}
