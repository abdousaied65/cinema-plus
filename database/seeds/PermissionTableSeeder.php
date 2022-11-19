<?php

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
        $permissions = [
            ['admins list',"admin",'قائمة المستخدمين','admin-web'],
            ['privileges list',"privilege",'قائمة الصلاحيات','admin-web'],

            ['show admin',"admin",'عرض مستخدم','admin-web'],
            ['add admin',"admin",'اضافة مستخدم','admin-web'],
            ['edit admin',"admin",'تعديل مستخدم','admin-web'],
            ['delete admin',"admin",'حذف مستخدم','admin-web'],

            ['show privilege',"privilege",'عرض صلاحية','admin-web'],
            ['add privilege',"privilege",'اضافة صلاحية','admin-web'],
            ['edit privilege',"privilege",'تعديل صلاحية','admin-web'],
            ['delete privilege',"privilege",'حذف صلاحية','admin-web'],
            ['add reservation',"reservation",'اضافة حجز','admin-web']
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission[0],
                'key' =>$permission[1],
                'name_ar' =>$permission[2],
                'guard_name' =>$permission[3]
            ]);
        }
    }
}
