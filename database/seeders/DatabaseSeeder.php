<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {    
        // 1. إنشاء الرتب (استخدمنا firstOrCreate عشان نمنع التكرار)
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $receptionistRole = Role::firstOrCreate(['name' => 'receptionist']);

        // 2. إنشاء حساب المدير (Admin)
        $admin = User::firstOrCreate(
            ['email' => 'admin@system.com'], // بيبحث بده
            [
                'name' => 'Waleed Admin',
                'password' => Hash::make('123456'), // كلمة سر سهلة للمناقشة
            ]
        );
        $admin->assignRole($adminRole);

        // 3. إنشاء حساب موظف الاستقبال (Receptionist)
        $staff = User::firstOrCreate(
            ['email' => 'staff@system.com'],
            [
                'name' => 'Reception Staff',
                'password' => Hash::make('123456'),
            ]
        );
        $staff->assignRole($receptionistRole);

        echo "✅ Roles and Users seeded successfully!\n";
        echo "Admin: admin@system.com | 123456\n";
        echo "Staff: staff@system.com | 123456\n";
    }
}