<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function validate(Request $request)
     {
         $request->validate([
             'tracking' => 'required|min:10',
             'weight' => 'required|integer|min:1',
             'description' => 'required',
             'status_id' => 'required|integer',
             'customer_id' => 'required|integer',
         ]);

         return redirect()->route('viewPackages');
     }

    public function index()
    {
        $package = Package::all();
        return view('moonApp.package.index', ['packages' => $package]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
