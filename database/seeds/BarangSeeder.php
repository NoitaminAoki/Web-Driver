<?php

use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('barangs')->insert([
            'nama_barang' => 'BD206',
            'parent' => 'yes'
        ]);

        DB::table('barangs')->insert([
            'nama_barang' => 'BD711',
            'parent' => 'no'
        ]);

        DB::table('barangs')->insert([
            'nama_barang' => 'GWK',
            'parent' => 'yes'
        ]);
    }
}
