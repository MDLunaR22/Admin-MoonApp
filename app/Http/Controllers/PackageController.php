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
        $packages = Package::all();
        return view('moonApp.package.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::all();
        $statuses = Status::all();

        return view('moonApp.package.add', compact('customers', 'statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'tracking'=> ['required', 'min:10'],
            'weight'=> ['required', 'numeric'],
            'description'=> ['required', 'string', 'min:7', 'max:255'],
            'status_id'=> ['required','numeric', 'exists:statuses,id'],
            'customer_id'=> ['required','numeric', 'exists:customers,id'],
        ]);

        $package = new Package();
        $package->tracking = $request->tracking;
        $package->weight = $request->weight;
        $package->description = $request->description;
        $package->status_id = $request->status_id;
        $package->customer_id = $request->customer_id;

        $package->save();

        return redirect()->route('viewPackages')->with('success', __('app.messages.success_added'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $packages = Package::find($id);
        $statuses = Status::all();
        $customers = Customer::all();

        return view('moonApp.package.show', compact('packages', 'statuses', 'customers'));
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

        $this->validate($request, [
            'tracking'=> ['required', 'min:10'],
            'weight'=> ['required', 'numeric'],
            'description'=> ['required', 'string', 'min:7', 'max:255'],
            'status_id'=> ['required','numeric', 'exists:statuses,id'],
            'customer_id'=> ['required','numeric', 'exists:customers,id'],
        ]);

        $package->tracking = $request->tracking;
        $package->weight = $request->weight;
        $package->description = $request->description;
        $package->status_id = $request->status_id;
        $package->customer_id = $request->customer_id;
        $package->save();

        return redirect()->route('viewPackages')->with('success', __('app.messages.success_updated'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $package = Package::find($id);

        $package->delete();

        return redirect()->route('viewPackages')->with('success', __('app.messages.success_deleted'));
    }
}
