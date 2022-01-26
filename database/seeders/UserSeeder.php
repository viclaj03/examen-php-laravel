<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $noAdmin = true;
        $admin = true;

        User::factory()->count(4)->create();
        User::factory()->count(1)->create(['admin'=>1]);
    }
}
