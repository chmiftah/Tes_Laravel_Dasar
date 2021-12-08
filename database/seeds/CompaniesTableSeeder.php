<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            [
                'id' => 1,
                'name' => "PT Aplikasi 1",
                'email' => "aplikasi1@aplikasi.id",
                'website' => 'aplikasi1.com',
                'logo' => '',
            ],
            [
                'id' => 2,
                'name' => "PT Aplikasi 2",
                'email' => "aplikasi2@aplikasi.id",
                'website' => 'aplikasi2.com',
                'logo' => '',
            ],
            [
                'id' => 3,
                'name' => "PT Aplikasi 3",
                'email' => "aplikasi3@aplikasi.id",
                'website' => 'aplikasi3.com',
                'logo' => '',
            ],
            [
                'id' => 4,
                'name' => "PT Aplikasi 4",
                'email' => "aplikasi4@aplikasi.id",
                'website' => 'aplikasi4.com',
                'logo' => '',
            ],
            [
                'id' => 5,
                'name' => "PT Aplikasi 5",
                'email' => "aplikasi5@aplikasi.id",
                'website' => 'aplikasi5.com',
                'logo' => '',
            ]
        ]);
    }
}
