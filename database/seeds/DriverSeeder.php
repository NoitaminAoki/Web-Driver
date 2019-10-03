<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Agung Purnomo',
            'no_pol' => 'B9373KAP',
            'email' => 'Agung_Purnomo_B9373KAP@gmail.com',
            'status' => 'Kontrak',
            'password' => Hash::make('1234'),
            'last_activity' => new \DateTime,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'name' => 'Ahmad Irfan Efendi',
            'no_pol' => 'B9894KAR',
            'email' => 'Ahmad_Irfan_Efendi_B9894KAR@gmail.com',
            'status' => 'Kontrak',
            'password' => Hash::make('1234'),
            'last_activity' => new \DateTime,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'name' => 'Andi Lau',
            'no_pol' => 'A8355TZ',
            'email' => 'Andi_Lau_A8355TZ@gmail.com',
            'status' => 'Kontrak',
            'password' => Hash::make('1234'),
            'last_activity' => new \DateTime,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'name' => 'Arifin PDO',
            'no_pol' => 'B9777TW',
            'email' => 'arifin_pdo_B9777TW@gmail.com',
            'status' => 'Panggilan',
            'password' => Hash::make('1234'),
            'last_activity' => new \DateTime,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'name' => 'Arnen',
            'no_pol' => 'B9501KAR',
            'email' => 'Arnen_B9501KAR@gmail.com',
            'status' => 'Kontrak',
            'password' => Hash::make('1234'),
            'last_activity' => new \DateTime,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'name' => 'Bowo',
            'no_pol' => 'B9576UAP',
            'email' => 'bowo_B9576UAP@gmail.com',
            'status' => 'Panggilan',
            'password' => Hash::make('1234'),
            'last_activity' => new \DateTime,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'name' => 'Bu Wiwin',
            'no_pol' => 'B9754TAV',
            'email' => 'Bu_Wiwin_B9754TAV@gmail.com',
            'status' => 'Kontrak',
            'password' => Hash::make('1234'),
            'last_activity' => new \DateTime,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'name' => 'Dodi',
            'no_pol' => 'B9049SZX',
            'email' => 'dodi_B9049SZX@gmail.com',
            'status' => 'Panggilan',
            'password' => Hash::make('1234'),
            'last_activity' => new \DateTime,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'name' => 'Eko Purnomo',
            'no_pol' => 'F8637GY',
            'email' => 'Eko_Purnomo_F8637GY@gmail.com',
            'status' => 'Kontrak',
            'password' => Hash::make('1234'),
            'last_activity' => new \DateTime,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'name' => 'Farhan',
            'no_pol' => 'B9669FAK',
            'email' => 'farhan_B9669FAK@gmail.com',
            'status' => 'Panggilan',
            'password' => Hash::make('1234'),
            'last_activity' => new \DateTime,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'name' => 'Heru Saputra',
            'no_pol' => 'B9276KAP',
            'email' => 'Heru_Saputra_B9276KAP@gmail.com',
            'status' => 'Kontrak',
            'password' => Hash::make('1234'),
            'last_activity' => new \DateTime,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'name' => 'Junaedi QQ Dwi Julianty',
            'no_pol' => 'B9598FAB',
            'email' => 'Junaedi_QQ_Dwi_Julianty_B9598FAB@gmail.com',
            'status' => 'Kontrak',
            'password' => Hash::make('1234'),
            'last_activity' => new \DateTime,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'name' => 'Lukman',
            'no_pol' => 'B9109FRW',
            'email' => 'lukman_B9109FRW@gmail.com',
            'status' => 'Panggilan',
            'password' => Hash::make('1234'),
            'last_activity' => new \DateTime,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'name' => 'Maman Permana Putra',
            'no_pol' => 'B9954KAR',
            'email' => 'maman_permana_putra_B9954KAR@gmail.com',
            'status' => 'Kontrak',
            'password' => Hash::make('1234'),
            'last_activity' => new \DateTime,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'name' => 'Marianto Marpaung',
            'no_pol' => 'B9389KAR',
            'email' => 'Marianto_Marpaung_B9389KAR@gmail.com',
            'status' => 'Kontrak',
            'password' => Hash::make('1234'),
            'last_activity' => new \DateTime,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'name' => 'Mastur',
            'no_pol' => 'B9153SAH',
            'email' => 'mastur_B9153SAH@gmail.com',
            'status' => 'Panggilan',
            'password' => Hash::make('1234'),
            'last_activity' => new \DateTime,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'name' => 'Maulana',
            'no_pol' => 'B9075KAH',
            'email' => 'maulana_B9075KAH@gmail.com',
            'status' => 'Panggilan',
            'password' => Hash::make('1234'),
            'last_activity' => new \DateTime,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'name' => 'Moh. Ali Imron',
            'no_pol' => 'B9782KAP',
            'email' => 'Moh._Ali_Imron_B9782KAP@gmail.com',
            'status' => 'Kontrak',
            'password' => Hash::make('1234'),
            'last_activity' => new \DateTime,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'name' => 'Mursit',
            'no_pol' => 'B9804FAH',
            'email' => 'mursit_B9804FAH@gmail.com',
            'status' => 'Panggilan',
            'password' => Hash::make('1234'),
            'last_activity' => new \DateTime,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'name' => 'Nalim Sunaryo',
            'no_pol' => 'B9520FUB',
            'email' => 'Nalim_Sunaryo_B9520FUB@gmail.com',
            'status' => 'Kontrak',
            'password' => Hash::make('1234'),
            'last_activity' => new \DateTime,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'name' => 'Nano',
            'no_pol' => 'B9674UAO',
            'email' => 'nano_B9674UAO@gmail.com',
            'status' => 'Panggilan',
            'password' => Hash::make('1234'),
            'last_activity' => new \DateTime,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'name' => 'Niman',
            'no_pol' => 'B9484KAR',
            'email' => 'Niman_B9484KAR@gmail.com',
            'status' => 'Kontrak',
            'password' => Hash::make('1234'),
            'last_activity' => new \DateTime,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'name' => 'Rahman',
            'no_pol' => 'BE9683C',
            'email' => 'Rahman_BE9683C@gmail.com',
            'status' => 'Kontrak',
            'password' => Hash::make('1234'),
            'last_activity' => new \DateTime,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'name' => 'Ranu',
            'no_pol' => 'B9286BAR',
            'email' => 'ranu_B9286BAR@gmail.com',
            'status' => 'Panggilan',
            'password' => Hash::make('1234'),
            'last_activity' => new \DateTime,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'name' => 'Remin',
            'no_pol' => 'B9940KAF',
            'email' => 'Remin_B9940KAF@gmail.com',
            'status' => 'Kontrak',
            'password' => Hash::make('1234'),
            'last_activity' => new \DateTime,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'name' => 'Safuwan QQ Saiful Achlan',
            'no_pol' => 'B9121KAA',
            'email' => 'Safuwan_QQ_Saiful_Achlan_B9121KAA@gmail.com',
            'status' => 'Kontrak',
            'password' => Hash::make('1234'),
            'last_activity' => new \DateTime,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'name' => 'Sidik',
            'no_pol' => 'B9460KAJ',
            'email' => 'sidik_B9460KAJ@gmail.com',
            'status' => 'Panggilan',
            'password' => Hash::make('1234'),
            'last_activity' => new \DateTime,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'name' => 'Singgih',
            'no_pol' => 'A8799AH',
            'email' => 'singgih_A8799AH@gmail.com',
            'status' => 'Panggilan',
            'password' => Hash::make('1234'),
            'last_activity' => new \DateTime,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'name' => 'Sumindar Darwin Sinaga',
            'no_pol' => 'B9716FAT',
            'email' => 'Sumindar_Darwin_Sinaga_B9716FAT@gmail.com',
            'status' => 'Kontrak',
            'password' => Hash::make('1234'),
            'last_activity' => new \DateTime,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'name' => 'Tardi Suryadi',
            'no_pol' => 'B9773KAP',
            'email' => 'Tardi_Suryadi_B9773KAP@gmail.com',
            'status' => 'Kontrak',
            'password' => Hash::make('1234'),
            'last_activity' => new \DateTime,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'name' => 'Toniara Sitinjak',
            'no_pol' => 'B9048UAP',
            'email' => 'Toniara_Sitinjak_B9048UAP@gmail.com',
            'status' => 'Kontrak',
            'password' => Hash::make('1234'),
            'last_activity' => new \DateTime,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'name' => 'Usman',
            'no_pol' => 'B9412KAD',
            'email' => 'usman_B9412KAD@gmail.com',
            'status' => 'Panggilan',
            'password' => Hash::make('1234'),
            'last_activity' => new \DateTime,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'name' => 'Yopie',
            'no_pol' => 'B9873FAG',
            'email' => 'yopie_B9873FAG@gmail.com',
            'status' => 'Panggilan',
            'password' => Hash::make('1234'),
            'last_activity' => new \DateTime,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
