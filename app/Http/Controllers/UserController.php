<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\CreateNewUser;
use App\Mail\WelcomeUserMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('moonApp.users.index', compact('users'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required','email','unique:users,email'],
            'role' => ['required', 'string', 'exists:roles,name'],
        ]);
        $user = new CreateNewUser();
        $password = Str::random(8);
        $user = $user->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
            'password_confirmation' => $password,
        ]);

        Mail::to($user->email)->send(new WelcomeUserMail($user, $password));
        return redirect()->route('viewUsers')->with('success', __('app.messages.success_added'));
    }
    
    public function show($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view("moonApp.users.show", compact('user', 'roles'));
    }
    
    public function edit(string $id)
    {
        //
    }
    
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required','min:3'],
            'email' => ['required','email', 'unique:users,email,'],
            'role' => ['required','exists:roles,name'],
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->syncRoles($request->role);
        $user->save();

        return redirect()->route('viewUsers')->with('success', __('app.messages.success_updated'));
    }
    
    public function destroy($id)
    {
        $user = User::find($id);
        if($user->getRoleNames()->first() == 'super-admin'){
            return redirect()->route('viewUsers')->with('error', __('app.messages.error_deleted_role'));
        }else{
            $user->delete();
            return redirect()->route('viewUsers')->with('success', __('app.messages.success_deleted'));
        }
    }
}
