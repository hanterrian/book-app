<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::create(['name' => 'Admin']);

        $pagePermission = Permission::create(['name' => 'page']);
        $productCategoryPermission = Permission::create(['name' => 'product-category']);
        $productPermission = Permission::create(['name' => 'product']);
        $userPermission = Permission::create(['name' => 'user']);

        $adminRole->givePermissionTo(
            $pagePermission,
            $productCategoryPermission,
            $productPermission,
            $userPermission
        );

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@localhost.loc',
            'email_verified_at' => time(),
            'password' => Hash::make('admin@localhost.loc'),
        ]);

        $admin->assignRole($adminRole);
    }
}
