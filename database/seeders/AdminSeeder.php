<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'username' => 'admin',
            'nama' => 'Admin Aplikasi',
            'password' => '$2y$10$tM9jRwwyxGYztNyOMjD1seTooWnkoiVbcuoy5EiCbu8bqjc7rgzJ.',
        ]);
    }
}
