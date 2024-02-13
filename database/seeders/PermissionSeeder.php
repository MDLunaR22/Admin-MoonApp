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
        $role = Role::create(['name' => 'creator']);

        $role = Role::create(['name' => 'super-admin']);

        $permissionsByRole = [
            'super-admin' => ['all'],
            'admin' => ['edit', 'create', 'view'],
            'creator' => ['create', 'view'],
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
            'creator' => $insertPermissions('creator')
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
