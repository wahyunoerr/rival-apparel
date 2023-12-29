<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // $roleDesainer = Role::create(['name' => 'desainer']);
        // $desainer = User::create([
        //     'name' => 'desainer',
        //     'email' => 'desainer@gmail.com',
        //     'password' => Hash::make('desainer123')
        // ]);

        // $desainer->assignRole($roleDesainer);
        $roleUser = Role::create(['name' => 'user']);
        $user = User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('user123')
        ]);

        $user->assignRole($roleUser);
    }
}
