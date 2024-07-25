<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Define permissions for each resource
        $resources = ['period', 'cohort', 'crebo', 'course', 'module', 'assignment', 'schoolclass',
            'student', 'enrolment', 'enrolmentstatus', 'schoolyear', 'classyear', 'classassignment', 'assignmentstatus', 'studentassignment',
            'enrolmentclass', 'learningoutcome', 'learninglevel', 'learningrelatedtechnique', 'learningsuboutcome', 'learningsuboutcomeassignment',
            'learningsuboutcomelevel', 'learningsuboutcometechnique'];

        foreach ($resources as $resource) {
            Permission::create(['name' => "index $resource"]);
            Permission::create(['name' => "show $resource"]);
            Permission::create(['name' => "create $resource"]);
            Permission::create(['name' => "edit $resource"]);
            Permission::create(['name' => "delete $resource"]);
        }

        $rolesPermissions = [
            'student' => [],
            'teacher' => ['index', 'show'],
            'keyteacher' => ['index', 'show', 'create', 'edit', 'delete'],
            'admin' => Permission::all()
        ];

        foreach ($rolesPermissions as $roleName => $permissions) {
            $role = Role::create(['name' => $roleName]);

            if ($permissions instanceof \Illuminate\Support\Collection) {
                $role->givePermissionTo($permissions);
            } else {
                foreach ($permissions as $permission) {
                    foreach ($resources as $resource) {
                        $role->givePermissionTo("$permission $resource");
                    }
                }
            }
        }
    }
}
