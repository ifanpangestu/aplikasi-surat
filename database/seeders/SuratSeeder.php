<?php

namespace Database\Seeders;

use App\Models\Surat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Surat::create([
            'pengirim' => 'shohib',
            'isi_surat' => 'Halo poh',
            'penerima' => 'ifan',
            'user_id' => 2
        ]);
    }
}
