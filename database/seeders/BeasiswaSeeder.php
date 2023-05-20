<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BeasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('beasiswas')->insert([
            'nama' => 'Bidikmisi',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('beasiswas')->insert([
            'nama' => 'Unggulan',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('beasiswas')->insert([
            'nama' => 'Unggulan Akd',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('beasiswas')->insert([
            'nama' => 'Unggulan Osis',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('beasiswas')->insert([
            'nama' => 'Unggulan Non',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('beasiswas')->insert([
            'nama' => 'Olah Raga Jaya Raya',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('beasiswas')->insert([
            'nama' => 'Unggulan Dp',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('beasiswas')->insert([
            'nama' => 'Kip Kuliah',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('beasiswas')->insert([
            'nama' => 'Asak',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('beasiswas')->insert([
            'nama' => 'Asak B',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('beasiswas')->insert([
            'nama' => 'Asak C',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('beasiswas')->insert([
            'nama' => 'Unggulan Kemdikbud',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('beasiswas')->insert([
            'nama' => 'Unggulan Seni & Budaya',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('beasiswas')->insert([
            'nama' => 'Unggulan Sains',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('beasiswas')->insert([
            'nama' => 'Marga Pembangunan Jaya',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
