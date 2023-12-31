<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\Models\User;
        $user->name = 'admin';
        $user->email = 'admin@gmail.com';
        $user->no_hp = '190905';
        $user->level = 'admin';
        $user->status = 'admin';
        $user->password = bcrypt('password');
        $user->save();
        $this->command->info('admin datang');
    }
}
