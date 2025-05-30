<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Membuat user baru
        User::create([
            'name' => 'admin',
            'email' => 'arganapulungan@gmail.com',
            'password' => Hash::make('argana03'),  // Password terenkripsi
        ]);
    }
}

