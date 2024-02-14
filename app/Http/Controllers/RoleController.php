<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 
        $roles = Role::all();
        $permissions = Permission::all();

        return view('moonApp.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $permissions = Permission::all();

        return view('moonApp.role.add', compact('permissions'));
    }

    public function buscar(Request $request)
    {
        $termino = $request->input('permissions');

        $resultados = Permission::where('campo', 'LIKE', "%$termino%")->get(); // Reemplaza 'campo' con el nombre del campo que quieres buscar

        return response($resultados);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "name" => "required|min:3",
            "permissions" => "array",
        ]);
        $role = Role::where('name', $request->name)->where('guard_name', 'web')->first();

        if ($role) {
            return redirect()->route('viewAddRole')->withErrors(['name' => __('app.exist.role')]);
        }
        $role = Role::create(['name' => $request->name, 'guard_name' => 'web']);
        $role->syncPermissions($request->permissions);
        return redirect()->route("viewRoles")->with("success", __("app.messages.success_added"));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $role = Role::findById($id);
        $roleHasPermissions = $role->permissions->pluck('id')->toArray();
        $permissions = Permission::all();

        return view('moonApp.role.show', compact('role', 'permissions', 'roleHasPermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $this->validate($request, [
            "name" => "required|min:3",
            "permissions" => "array",
        ]);
        $role = Role::find($id);
        $role->name = $request->name;
        $role->save();

        if (is_array($request->permissions)) {
            $role->syncPermissions($request->permissions);
        }
        return redirect()->route("viewRoles")->with("success", __("app.messages.success_updated"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::find($id);
        if ($role->name == "super-admin") {
            return redirect()->route("viewRoles")->with("error", __("app.messages.error_deleted_role"));
        } else {
            $role->delete();
            return redirect()->route("viewRoles")->with("success", __("app.messages.success_deleted"));
        }
    }
}
