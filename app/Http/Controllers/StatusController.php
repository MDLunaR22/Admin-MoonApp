<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Status;
use Illuminate\Http\Request;

// use Illuminate\Support\Str;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // public function validate(Request $request)
    // {
    // $this->validate($request, [
    //     'name' => 'required|unique:statuses|max:255',
    //     'description' => 'required',
    // ]);
    // }

    public function index()
    {
        $statuses = Status::all();
        return view('moonApp.status.index', compact('statuses'));
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
            'name' => ['required', 'min:3', 'unique:status,name'],
            'description' => ['required','min:10'],
            'order' => ['required','integer'],
        ]);

        $status = new Status();
        $stauses = Status::all()->count();
        $status->name = $request->name;
        $status->description = $request->description;
        if ($request->order != null) {
            $status->order = $stauses + 1;
        }
        $status->save();

        return redirect()->route('viewStatuses')->with('success', __('app.messages.success_added'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $status = Status::find($id);
        return view('moonApp.status.show', compact('status'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:10',
            'order' => 'required|integer',
        ]);

        $status = Status::find($id);
        $status->name = $request->name;
        $status->description = $request->description;
        $status->order = $request->order;

        $status->save();
        return redirect()->route('viewStatuses')->with('success', __('app.messages.success_updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $status = Status::find($id);
        $package = Package::where('status_id', $id)->get();

        if ($package->isEmpty()) {
            $status->delete();
            return redirect()->route('viewStatuses')->with('success', __('app.messages.success_deleted'));
        } else {
            return redirect()->route('viewStatuses')->with('error', `$package->id` . __('app.messages.error_deleted'));
        }

    }
}
