<?php

use App\Models\Admin;
use Illuminate\Database\Seeder;
use App\Models\Profile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // super admin
        $admin = Admin::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12341234'),
            'type' => 'admin',
            'role_name' =>["super admin"] ,
            'Status' => 'active',
            'email_verified_at' =>now(),
            'api_token' => Str::random(80)
        ]);
        $role = Role::create(['name' => 'super admin','name_ar' => 'مدير النظام','guard_name' => 'admin-web']);
        $role->syncPermissions([1,2,3,4,5,6,7,8,9,10]);
        DB::table('model_has_roles')->insert([
            'role_id' => 1,
            'model_type' => 'App\Models\Admin',
            'model_id' => 1,
        ]);
        $profile = Profile::create([
            'phone_number' => '',
            'city_name' => '',
            'age' => '',
            'gender' => '',
            'profile_pic' => 'admin-assets/img/admin-avatar.png',
            'admin_id' => 1
        ]);
    }
}
