<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
  
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'transfer-credit-to-user',
            'transfer-credit-to-reseller',
            'transfer-credit-to-distributor'
        ];

        $user_permissions = [
            'test-list',
            'tset-create',
            'test-edit',
            'test-delete',
        ];
      
        foreach ($admin_permissions as $admin_permission) {
            Permission::create(['guard_name' => 'admin', 'name' => $admin_permission]);
        }

        foreach ($user_permissions as $user_permission) {
            // Permission::create(['guard_name' => 'web', 'name' => $user_permission]);
            Permission::create(['name' => $user_permission]);
       }
    }
}