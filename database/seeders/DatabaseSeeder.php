<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Wan;
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
        // \App\Models\User::factory(10)->create();

        Wan::create([
            'name' =>'wan5',
            'package' => 'fast50',
            'isp' => 'Viettel',
            'contract_speed' => 100000000, // Byte
        ]);

        Wan::create([
            'name' =>'wan6',
            'package' =>'net4plus',
            'isp' => 'Viettel',
            'contract_speed' => 200000000,
        ]);

        Wan::create([
            'name' =>'wan7',
            'package' =>'home5-super',
            'isp' => 'VNPT',
            'contract_speed' => 300000000,
        ]);
    }
}
