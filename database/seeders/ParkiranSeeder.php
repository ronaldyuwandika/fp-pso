<?php

namespace Database\Seeders;

use App\Models\Parkir;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParkiranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $data = array(
            [
                'kode_parkir' => 'A1',
                'nama_parkir' => 'Parkiran Sistem Informasi',
                'kuota_parkir' => 100,
                'kendaraan_parkir' => 0,
            ],
            [
                'kode_parkir' => 'A2',
                'nama_parkir' => 'Parkiran Informatika',
                'kuota_parkir' => 200,
                'kendaraan_parkir' => 0,
            ],
            [
                'kode_parkir' => 'A3',
                'nama_parkir' => 'Parkiran Teknologi Informasi',
                'kuota_parkir' => 250,
                'kendaraan_parkir' => 0,
            ],
            [
                'kode_parkir' => 'A4',
                'nama_parkir' => 'Parkiran Teknik Elektro',
                'kuota_parkir' => 200,
                'kendaraan_parkir' => 0,
            ],
            [
                'kode_parkir' => 'A5',
                'nama_parkir' => 'Parkiran Teknik Biomedik',
                'kuota_parkir' => 100,
                'kendaraan_parkir' => 0,
            ],
            [
                'kode_parkir' => 'A6',
                'nama_parkir' => 'Parkiran Teknik Komputer',
                'kuota_parkir' => 120,
                'kendaraan_parkir' => 0,
            ],
            [
                'kode_parkir' => 'A7',
                'nama_parkir' => 'Parkiran Teknik Telekomunikasi',
                'kuota_parkir' => 140,
                'kendaraan_parkir' => 0,
            ],
            [
                'kode_parkir' => 'A8',
                'nama_parkir' => 'Parkiran Perpustakaan',
                'kuota_parkir' => 300,
                'kendaraan_parkir' => 0,
            ],
        );

        Parkir::insert($data);
    }
}
