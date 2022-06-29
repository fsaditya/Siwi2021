<?php

use Illuminate\Database\Seeder;

class ProdisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('prodis')->insert([
        	'id' => 11,
        	'nama_prodi' => 'D III AKUNTANSI',
        	'jurusan' => 'AKUNTANSI',
        ]);
        \DB::table('prodis')->insert([
        	'id' => 12,
        	'nama_prodi' => 'D III AKUNTANSI ALIH PROGRAM',
        	'jurusan' => 'AKUNTANSI',
        ]);
        \DB::table('prodis')->insert([
        	'id' => 13,
        	'nama_prodi' => 'D IV AKUNTANSI',
        	'jurusan' => 'AKUNTANSI',
        ]);
        \DB::table('prodis')->insert([
        	'id' => 14,
        	'nama_prodi' => 'D IV AKUNTANSI ALIH PROGRAM(Non Akt)',
        	'jurusan' => 'AKUNTANSI',
        ]);
        \DB::table('prodis')->insert([
        	'id' => 15,
        	'nama_prodi' => 'D IV AKUNTANSI ALIH PROGRAM(Akt)',
        	'jurusan' => 'AKUNTANSI',
        ]);


        \DB::table('prodis')->insert([
        	'id' => 21,
        	'nama_prodi' => 'D III PAJAK',
        	'jurusan' => 'PAJAK',
        ]);
        \DB::table('prodis')->insert([
        	'id' => 22,
        	'nama_prodi' => 'D III PAJAK ALIH PROGRAM',
        	'jurusan' => 'PAJAK',
        ]);
        \DB::table('prodis')->insert([
        	'id' => 23,
        	'nama_prodi' => 'D III PBB/PENILAI',
        	'jurusan' => 'PAJAK',
        ]);
        \DB::table('prodis')->insert([
        	'id' => 24,
        	'nama_prodi' => 'D III PBB/PENILAI ALIH PROGRAM',
        	'jurusan' => 'PAJAK',
        ]);


        \DB::table('prodis')->insert([
        	'id' => 31,
        	'nama_prodi' => 'D III KEPABEAN DAN CUKAI',
        	'jurusan' => 'KEPABEAN DAN CUKAI',
        ]);
        \DB::table('prodis')->insert([
        	'id' => 32,
        	'nama_prodi' => 'D III KEPABEAN DAN CUKAI ALIH PROGRAM',
        	'jurusan' => 'KEPABEAN DAN CUKAI',
        ]);


		\DB::table('prodis')->insert([
        	'id' => 41,
        	'nama_prodi' => 'D III KEBENDAHARAAN NEGARA',
        	'jurusan' => 'MANAJEMEN KEUANGAN',
		]);
		\DB::table('prodis')->insert([
        	'id' => 42,
        	'nama_prodi' => 'D III KEBENDAHARAAN NEGARA ALIH PROGRAM',
        	'jurusan' => 'MANAJEMEN KEUANGAN',
		]);
		\DB::table('prodis')->insert([
        	'id' => 43,
        	'nama_prodi' => 'D III MANAJEMEN ASET',
        	'jurusan' => 'MANAJEMEN KEUANGAN',
        ]);
    }
}
