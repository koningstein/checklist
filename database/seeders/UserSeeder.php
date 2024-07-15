<?php

namespace Database\Seeders;

use App\Models\Student;
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
        Student::create([
            'studentNr' => 123456,
            'user_id' => $student->id,
        ]);

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

        //User::factory(10)->create();
        $students = [
            ['studentNr' => '9011034', 'firstName' => 'Natu', 'lastName' => 'Abraha'],
            ['studentNr' => '9018934', 'firstName' => 'Rowen', 'lastName' => 'Bakkeren'],
            ['studentNr' => '9018437', 'firstName' => 'Pascal', 'lastName' => 'Benink'],
            ['studentNr' => '9016333', 'firstName' => 'Janco', 'lastName' => 'Buitendijk'],
            ['studentNr' => '9011037', 'firstName' => 'Shania', 'lastName' => 'Casuela'],
            ['studentNr' => '9017932', 'firstName' => 'Donny', 'lastName' => 'van Eijk'],
            ['studentNr' => '9019236', 'firstName' => 'Donny', 'lastName' => 'Eikmans'],
            ['studentNr' => '9018248', 'firstName' => 'Marc', 'lastName' => 'Van Elswijk'],
            ['studentNr' => '9015379', 'firstName' => 'Brandon', 'lastName' => 'van der Ent'],
            ['studentNr' => '9020308', 'firstName' => 'Mark', 'lastName' => 'Van der Giessen'],
            ['studentNr' => '9019926', 'firstName' => 'Tino', 'lastName' => 'van Hoorn'],
            ['studentNr' => '9012373', 'firstName' => 'Gydo', 'lastName' => 'van Hunen'],
            ['studentNr' => '9018469', 'firstName' => 'Stefano', 'lastName' => 'Koster'],
            ['studentNr' => '9020693', 'firstName' => 'Roberto', 'lastName' => 'Kruit Garcia'],
            ['studentNr' => '9018464', 'firstName' => 'Adrian', 'lastName' => 'Kusmierek'],
            ['studentNr' => '9014200', 'firstName' => 'Jonathan', 'lastName' => 'Luijendijk'],
            ['studentNr' => '9012714', 'firstName' => 'Quinten', 'lastName' => 'van Oostrom'],
            ['studentNr' => '9012734', 'firstName' => 'Jayjay', 'lastName' => 'Plet'],
            ['studentNr' => '9014223', 'firstName' => 'Jeffrey', 'lastName' => 'Reij'],
            ['studentNr' => '9020599', 'firstName' => 'Jason', 'lastName' => 'Ronoastro'],
            ['studentNr' => '9016560', 'firstName' => 'Jaedon', 'lastName' => 'Rosaria'],
            ['studentNr' => '9018327', 'firstName' => 'Arnout', 'lastName' => 'Van Sluijs'],
            ['studentNr' => '9015492', 'firstName' => 'Daniel', 'lastName' => 'Stefanov'],
            ['studentNr' => '9018467', 'firstName' => 'Thijs', 'lastName' => 'Sterenborg'],
            ['studentNr' => '9016530', 'firstName' => 'Dion', 'lastName' => 'Vermeer'],
            ['studentNr' => '9016605', 'firstName' => 'Quentin', 'lastName' => 'Viergever'],
            ['studentNr' => '9021012', 'firstName' => 'Jesse', 'lastName' => 'van Vliet'],
            ['studentNr' => '9016029', 'firstName' => 'Owen', 'lastName' => 'Vos'],
            ['studentNr' => '9014592', 'firstName' => 'Alex', 'lastName' => 'Wilkinson'],
            ['studentNr' => '9007170', 'firstName' => 'Lars', 'lastName' => 'Zwanenburg'],
        ];

        foreach ($students as $studentData) {
            $user = User::create([
                'name' => $studentData['firstName'] . ' ' . $studentData['lastName'],
                'email' => $studentData['studentNr'] . '@student.tcrmbo.nl',
                'password' => Hash::make('password'),
            ]);
            $user->assignRole('student');

            Student::create([
                'studentNr' => $studentData['studentNr'],
                'user_id' => $user->id,
            ]);
        }
    }
}
