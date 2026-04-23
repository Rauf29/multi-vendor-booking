<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name'              => 'Admin',
                'password'          => Hash::make( 'password' ),
                'role'              => User::ROLE_ADMIN,
                'phone'             => '01700000000',
                'status'            => User::STATUS_ACTIVE,
                'email_verified_at' => now(),
            ]
        );
    }
}
