<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Str;

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
            'surname'=> 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'phone' => 'required|min:8',
        ]);

        $customer = new Customer();
        $customer -> name = $request->name;
        $customer -> surname = $request->surname;
        $customer -> code = Str::random(6);
        $customer -> email = $request->email;
        $customer -> password = $request->password;
        $customer -> phone = $request->phone;

        $customer->save();

        return redirect()->route('viewCustomers')->with('success', 'Customer created successfully');
    }

    public function index()
    {
        $customers = Customer::all();
        return view('moonApp.customer.index', compact('customers'));
    }

    public function show($id){
        $customer = Customer::find($id);
        return view('moonApp.customer.show', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $request -> validate([
            'name' => 'required|min:3',
            'surname'=> 'required|min:3',
            'phone' => 'required|min:8',
        ]);

        $customer = Customer::find($id);
        $customer->name = $request->name;
        $customer->surname = $request->surname;
        $customer->phone = $request->phone;
        $customer->save();

        // return view('moonApp.index', ['succes' => 'Customer updated successfully']);

        return redirect()->route('viewCustomers')->with('success', 'Customer updated successfully');
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);
        $package = Package::where('customer_id', $id)->get();
        
        if($package->isEmpty()){
            $customer->delete();
            return redirect()->route('viewCustomers')->with('success', 'Customer deleted successfully');
        }else{
            return redirect()->route('viewCustomers')->with('error', 'Customer cannot be deleted because it is in use');
        }

    }
}
