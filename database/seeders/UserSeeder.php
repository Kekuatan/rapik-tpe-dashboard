<?php

namespace Database\Seeders;

use App\Enum\UserEnum;
use App\Models\Shift;
use Illuminate\Database\Seeder;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create
        (['name' => 'admin test',
            'address' => 'jl. kali sari',
            'gender' => 'mesin',
            'phone_number' => '000000000',
            'password' => Hash::make('admin'),
            'email' => 'admin@admin.com',
            'tax' => 20.00,
            'level' => UserEnum::LEVEL_ADMIN,
        ]);//Hash::make($request->password),
    }
}
