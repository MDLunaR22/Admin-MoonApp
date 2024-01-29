<?php

namespace App\Http\Controllers;

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
        $status = Status::all();
        return view('moonApp.status.index', compact('status'));
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

        $request ->validate([
            'name'=> 'required|min:3',
            'description'=> 'required|min:10',
            // 'order'=> 'required|numeric',
        ]);

        $status = new Status();
        $status->name = $request->name;
        $status->description = $request->description;
        $status->order = 0;
        $status->save();

        return redirect()->route('viewStatuses');
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
        $status = Status::find($id);
        $status->name = $request->name;
        $status->description = $request->description;
        
        $status->save();
        return redirect()->route('viewStatuses');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $status = Status::find($id);

        $status->delete();

        return redirect()->route('viewStatuses');
    }
}
