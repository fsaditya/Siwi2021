<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create('id_ID');

        for($i = 1; $i <= 5000; $i++)
        {
            DB::table('mahasiswas')->insert([
                'npm' => $faker->randomNumber(5),
                'nama' => $faker->name(),
                'kelas' => $faker->numberBetween($min = 1, $max = 40),
                'absen' => $faker->numberBetween($min = 1, $max = 40),
                'prodi_id' => $faker->randomElement(['11', '12', '13', '14', '15', '21', '22', '23', '24', '31', '32', '41', '42', '43']),
                'jenis_kelamin' => $faker->randomElement(['laki-laki', 'perempuan']),
                'status_ambil_toga' => $faker->boolean(),
            ]);
        }
    }
}
