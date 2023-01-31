<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
  
class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Admin::create([
            'name' => 'gsmfabrica',
            'password' => bcrypt('asdfasdf'),
        ]);

        // $user = User::create([
        //     'name' => 'gsmfabrica', 
        //     'email' => 'admin@gmail.com',
        //     'password' => bcrypt('6$m+faß')
        // ]);

        // Create a manager role for users authenticating with the admin guard:
        $role = Role::create(['guard_name' => 'admin', 'name' => 'Admin']);
        $permissions = Permission::where('guard_name', 'admin')->pluck('name','id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}