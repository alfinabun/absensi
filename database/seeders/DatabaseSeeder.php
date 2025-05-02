<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

            //

            $user = [
                [
                    'email'=>'admin@gmail.com',
                    'level'=>'admin',
                    'password'=>Hash::make('123'),
                    'foto' => 'alfi.png',
                    'nik' => '241109',
                    'nama' => 'Abun',
                    'jenisKelamin' => 'Laki-laki',
                    'alamat' => 'Jakarta',
                    'jabatan' => 'Ceo',
                    'notelp' => '081906806724'
                ],
                [
                    'email'=>'user@gmail.com',
                    'level'=>'user',
                    'password'=>Hash::make('1234'),
                    'foto' => 'abun.png',
                    'nik' => '241102',
                    'nama' => 'Alfi',
                    'jenisKelamin' => 'Perempuan',
                    'alamat' => 'Jakarta',
                    'jabatan' => 'Sekretaris',
                    'notelp' => '081906806724',
                ],
    
            ];
    
            foreach ($user as $key => $value) {
                User::create($value);
            }
    }
}
