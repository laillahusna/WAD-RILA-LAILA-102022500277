<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['username' => 'adminlaila'],
            ['password' => 'nugraha', 'role' => 'admin']
        );

        User::updateOrCreate(
            ['username' => 'petugaslaila'],
            ['password' => 'nugraha', 'role' => 'petugas']
        );
    }
}
