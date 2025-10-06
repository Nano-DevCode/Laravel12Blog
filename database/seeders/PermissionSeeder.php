<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permisions = [
            'access dashboard',
            'manage categories',
            'manage posts',
            'manage permissions',
            'manage roles',
            'manage users',
        ];

        foreach($permisions as $permision){
            Permission::create([
                'name' => $permision
            ]);
        }
    }
}
