<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create role
        Role::create(['name' => 'Petugas']);
        Role::create(['name' => 'Kader']);
        Role::create(['name' => 'Orang Tua']);

        // create credential
        $petugas = User::create([
            'name' => 'Petugas',
            'email' => 'petugas@mail.com',
            'password' => bcrypt('petugas1234')
        ]);
        $kader = User::create([
            'name' => 'Kader',
            'email' => 'kader@mail.com',
            'password' => bcrypt('kader1234')
        ]);
        $orang_tua = User::create([
            'name' => 'Orang Tua',
            'email' => 'orangtua@mail.com',
            'password' => bcrypt('orangtua1234')
        ]);

        $petugas->assignRole('Petugas');
        $kader->assignRole('Kader');
        $orang_tua->assignRole('Orang Tua');
    }
}
