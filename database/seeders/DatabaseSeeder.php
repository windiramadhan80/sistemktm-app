<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(200)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // DB::table('users')->insert([
        //     'name' => 'Windi Ramadhan',
        //     'email' => 'windiramadhan80@gmail,com',
        //     'tempat_tanggal_lahir' => 'Ciamis, 10 Januari 1998',
        //     'jenis_kelamin' => 'Laki-Laki',
        //     'program_studi' => 'Manajemen Logistik',
        //     'password' => Hash::make('password'),
        // ]);
    }
}
