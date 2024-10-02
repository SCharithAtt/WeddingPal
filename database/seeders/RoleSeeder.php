<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


    public function run(): void
    {
        //

        Role::create(['name' => 'Client']);
        Role::create(['name' => 'Vendor']);
        Role::create(['name' => 'Admin']);

    }
}
