<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Package;
use App\Models\Status;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */

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
        $customers = Customer::all();
        $statuses = Status::all();

        return view('moonApp.package.add', ['customers' => $customers, 'statuses' => $statuses]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'tracking'=> 'required|min:10',
            'weight'=> 'required|numeric',
            'description'=> 'required|min:7',
            'status_id'=> 'required|numeric',
            'customer_id'=> 'required|numeric',
        ]);

        $package = new Package();
        $package->tracking = $request->tracking;
        $package->weight = $request->weight;
        $package->description = $request->description;
        $package->status_id = $request->status_id;
        $package->customer_id = $request->customer_id;

        $package->save();

        return redirect()->route('viewPackages');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $package = Package::find($id);
        $status = Status::all();
        $customer = Customer::all();

        return view('moonApp.package.show', ['packages' => $package, 'statuses' => $status, 'customers' => $customer]);
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
        $package = Package::find($id);

        $request->validate([
            'tracking'=>'required|min:10',
            'weight'=>'required|numeric',
            'description'=>'required|min:5',
            'status_id'=>'required|integer',
            'customer_id'=>'required|integer'
        ]);

        $package->tracking = $request->tracking;
        $package->weight = $request->weight;
        $package->description = $request->description;
        $package->status_id = $request->status_id;
        $package->customer_id = $request->customer_id;
        $package->save();

        return redirect()->route('viewPackages');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $package = Package::find($id);

        $package->delete();

        return redirect()->route('viewPackages')->with('success', 'Package deleted successfully');
    }
}
