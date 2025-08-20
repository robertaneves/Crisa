<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(){
        User::updateOrCreate([
            'name' => 'Administrador',
            'email' => 'admin@crisa.com', 
            'password' => Hash::make('123456'), 
            'is_admin' => true]);
    }
}
