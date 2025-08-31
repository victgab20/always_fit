<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Domain\Exercise\Models\Exercise;

use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            ['name' => 'Tester', 'email' => 'tester@alwaysfit1.com.br', 'password' => bcrypt('password')],
            ['name' => 'Gabriel', 'email' => 'gabriel@alwaysfit1.com.br', 'password' => bcrypt('password')],
        ];

        User::insert($users);
    }
}
