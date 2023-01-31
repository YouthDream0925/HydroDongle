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
            'first_name' => 'Milan',
            'last_name' => 'Ignjatovic',
            'email' => 'super.admin@gmail.com',
            'credit' => 0,
            'password' => bcrypt('123456789'),
        ]);

        // $user = User::create([
        //     'name' => 'gsmfabrica', 
        //     'email' => 'admin@gmail.com',
        //     'password' => bcrypt('6$m+faß')
        // ]);

        // Create a manager role for users authenticating with the admin guard:
        $role = Role::create(['guard_name' => 'admin', 'name' => 'SuperAdmin']);
        $permissions = Permission::where('guard_name', 'admin')->pluck('name','id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}