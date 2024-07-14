<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $student = User::factory()->create([
           'name' => 'Student',
           'email' => 'student@tcrmbo.nl',
           'password' => Hash::make('test1234')
        ]);
        $student->assignRole('student');

        $teacher = User::factory()->create([
            'name' => 'Teacher',
            'email' => 'teacher@tcrmbo.nl',
            'password' => Hash::make('test1234')
        ]);
        $teacher->assignRole('teacher');

        $keyTeacher = User::factory()->create([
            'name' => 'KeyTeacher',
            'email' => 'keyteacher@tcrmbo.nl',
            'password' => Hash::make('test1234')
        ]);
        $keyTeacher->assignRole('keyteacher');

        $admin= User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@tcrmbo.nl',
            'password' => Hash::make('test1234')
        ]);
        $admin->assignRole('admin');

        User::factory(10)->create();
    }
}
