<?php

namespace Database\Seeders;

use App\Models\Customers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as DataDummy;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dummy = DataDummy::create('id_ID');
        $data = [];
        for($i=0; $i < 100; $i++){
            $gender = $dummy->randomElement(['male', 'female']);
            $data[] = [
                'email' => $dummy->email(),
                'first_name' => $dummy->firstName($gender),
                'last_name' => $dummy->lastName(),
                'city' => $dummy->city(),
                'address' => $dummy->address(),
                'password' => Hash::make('12345678')
            ];
        }
        (new Customers())->insert($data);
    }
}
