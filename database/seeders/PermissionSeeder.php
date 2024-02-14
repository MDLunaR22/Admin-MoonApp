<?php

namespace Database\Seeders;

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $role = Role::create(['name' => 'admin']);
        // or may be done by chaining
        $role = Role::create(['name' => 'user']);

        $role = Role::create(['name' => 'super-admin']);

        $permissions = [
            'user' => ['user_view', 'user_create', 'user_edit', 'user_delete'],
            'package' => ['package_view', 'package_create', 'package_edit', 'package_delete'],
            'status' => ['status_view', 'status_create', 'status_edit', 'status_delete'],
            'customer' => ['customer_view', 'customer_create', 'customer_edit', 'customer_delete'],
            'role' => ['role_view', 'role_create', 'role_edit', 'role_delete'],
        ];

        $permissionsByRole = [
            'super-admin' => array_merge($permissions['user'], $permissions['package'], $permissions['status'], $permissions['customer'], $permissions['role']),
            'admin' => array_merge([$permissions['package'][0], $permissions['package'][1], $permissions['package'][2]], [$permissions['status'][0], $permissions['status'][1], $permissions['status'][2]], [$permissions['customer'][0], $permissions['customer'][1], $permissions['customer'][2]]),
            'user' => array_merge([$permissions['package'][0]], [$permissions['customer'][0], $permissions['customer'][1]]),
        ];

        $insertPermissions = fn($role) => collect($permissionsByRole[$role])
            ->map(function ($name) {
                $existingPermission = DB::table('permissions')
                    ->where('name', $name)
                    ->where('guard_name', 'web')
                    ->first();

                if ($existingPermission) {
                    return $existingPermission->id;
                }
                return DB::table('permissions')->insertGetId(['name' => $name, 'guard_name' => 'web']);
            })
            ->toArray();

        $permissionIdsByRole = [
            'super-admin' => $insertPermissions('super-admin'),
            'admin' => $insertPermissions('admin'),
            'user' => $insertPermissions('user')
        ];

        foreach ($permissionIdsByRole as $role => $permissionIds) {
            $role = Role::whereName($role)->first();

            DB::table('role_has_permissions')
                ->insert(
                    collect($permissionIds)->map(fn($id) => [
                        'role_id' => $role->id,
                        'permission_id' => $id
                    ])->toArray()
                );
        }
        $userCount = User::count();

        for ($i = 1; $i <= $userCount; $i++) {
            if ($i == 1) {
                $user = User::find($i);
                $user->assignRole('super-admin');
            } else {
                $roles = Role::all();
                $user = User::find($i);
                $user->assignRole($roles->filter(fn($role) => $role->name !== 'super-admin')->random());
            }
        }
    }
}
