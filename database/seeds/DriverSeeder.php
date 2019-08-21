<?php

use Illuminate\Database\Seeder;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('barangs')->insert([
            'name' => 'Safuwan QQ Saiful Achlan',
            'no_pol' => 'B9121KAA',
            'email' => 'Safuwan_QQ_Saiful_Achlan_B9121KAA@gmail.com',
            'status' => 'Kontrak',
            'password' => Hash::make('1234'),
            'last_activity' => new \DateTime
        ]);
    }
}
