<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /*
     * index para mostrar todos los customers 
     * store para guardar un nuevo customer
     * update para actualizar un customer
     * destroy para eliminar un customer
     * edit para mostrar un formulario de edicion de un customer
     */

    public function store(Request $request)
    {
        $request -> validate([
            'name' => 'required|min:3',
        ]);

        $customer = new Customer();
        $customer -> name = $request->name;

        $customer->save();

        return redirect()->route('addCustomer')->with('succes', 'Customer created successfully');
    }

    public function index()
    {
        $customers = Customer::all();
        return view('moonApp.customers.index', ['customer' => $customers]);
    }

    public function show($id){
        $customer = Customer::find($id);
        return view('moonApp.showCustomer', ['customer' => $customer]);
    }

    public function update(Request $request, $id)
    {
        $request -> validate([
            'name' => 'required|min:3',
        ]);

        $customer = Customer::find($id);
        $customer -> name = $request->name;
        $customer->save();

        // return view('moonApp.index', ['succes' => 'Customer updated successfully']);

        return redirect()->route('viewCustomers')->with('succes', 'Customer updated successfully');
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();

        return redirect()->route('viewCustomers')->with('succes', 'Customer deleted successfully');
    }
}
