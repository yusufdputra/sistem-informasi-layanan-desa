<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use App\Models\Layanan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'nik' => 'admin',
            'username' => 'admin',
            'password' => bcrypt('admin1234')
        ]);

        $admin->assignRole('admin');

        $admin = User::create([
            'nik' => 'kades',
            'username' => 'kades',
            'password' => bcrypt('kades1234')
        ]);

        $admin->assignRole('kades');

        // jabatan
        Jabatan::insert([
            [
                'nama'          => 'Pemberdayaan Kesejahteraan Keluarga (PKK)',
                'created_at'    => Carbon::now()
            ],
            [
                'nama'          => 'Karang Taruna',
                'created_at'    => Carbon::now()
            ],
            [
                'nama'          => 'Perwiridan',
                'created_at'    => Carbon::now()
            ],
            [
                'nama'          => 'Kelompok Tani',
                'created_at'    => Carbon::now()
            ],
            [
                'nama'          => 'Keagamaan',
                'created_at'    => Carbon::now()
            ],
            [
                'nama'          => 'Ormas LSM',
                'created_at'    => Carbon::now()
            ],
            [
                'nama'          => 'LINMAS',
                'created_at'    => Carbon::now()
            ],

        ]);

        // jenis surat
        // jabatan
        Layanan::insert([
            [
                'nama'          => 'SURAT KETERANGAN KURANG MAMPU',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'nama'          => 'SURAT KETERANGAN USAHA',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'nama'          => 'SURAT KETERANGAN PENGHASILAN',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'nama'          => 'SURAT KETERANGAN BEDA NAMA',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'nama'          => 'SURAT KETERANGAN DOMISILI',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
        ]);

        
    }
}
