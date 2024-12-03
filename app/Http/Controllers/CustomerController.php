<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();
 
        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:companies',
        ],
        [
            'required' => 'Harap bagian :attribute di isi', 
            'unique' => 'Data :attribute sudah terdaftar di sistem!',
        ]);

        
        $company = Company::create([
            'name' => $request->name,
        ]);
        
        $company_id = $company->id;

        $customer =Customer::create([
            'company_id' => $company_id,
        ]);

        return redirect('/customers')->with('status', 'Customer Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $rules = [];

        
        if($request->name != $customer->name){
            $rules['name'] = 'required|unique:companies';
        }

        $validatedData = $request->validate($rules);

        Company::where('id', $customer->company->id)->update($validatedData);

        return redirect('/customers')->with('status', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {

        Company::where('id',$customer->company->id)->delete();

        $customer->delete();

        return redirect('/customers')->with('status', 'Data berhasil dihapus');

    }
}
