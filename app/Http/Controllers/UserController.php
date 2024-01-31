<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\CreateNewUser;
use App\Mail\WelcomeUserMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('moonApp.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
        ]);

        $user = new CreateNewUser();
        $password = Str::random(8);
        $user = $user->create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> $password,
            'password_confirmation' => $password,
        ]);

        // dd($user)

        // return Mail::to($request->email)->send(new WelcomeUserMail($user));

        return (new WelcomeUserMail($user, $password));

        // $user->name = $request->input('name');
        // $user->email = $request->input('email');
        // $user->password = Str::random(6);        
        // return redirect()->route('viewUsers')->with('success', 'Usuario creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::find($id);
        return view("moonApp.users.show", ['user' => $user]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
