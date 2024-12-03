<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = supplier::all();
 
        return view('suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('suppliers.create');
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

        $supplier =supplier::create([
            'company_id' => $company_id,
        ]);

        return redirect('/suppliers')->with('status', 'supplier Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        $rules = [];

        
        if($request->name != $supplier->name){
            $rules['name'] = 'required|unique:companies';
        }

        $validatedData = $request->validate($rules);

        Company::where('id', $supplier->company->id)->update($validatedData);

        return redirect('/suppliers')->with('status', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {

        Company::where('id',$supplier->company->id)->delete();

        $supplier->delete();

        return redirect('/suppliers')->with('status', 'Data berhasil dihapus');

    }
}
