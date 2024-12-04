<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::all();
        $customers = Customer::all();
 
        return view('transactions.index', 
        [
            'customers' => $customers,
            'transactions'=> $transactions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::all();
        
        return view('transactions.create',[
            'customers' => $customers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product' => 'required',
            'customer_id' => 'required',
            'price' => 'required',
            'qty' => 'required',
        ],
        [
            'required' => 'Harap bagian :attribute di isi', 
            'customer_id.required' => 'Harap bagian customer di isi', 
        ]);

        $product = Transaction::create([
            'product' => $request->product,
            'customer_id' => $request->customer_id,
            'include_ppn' => $request->include_ppn,
            'qty' => $request->qty,
            'price' => $request->price,
            'subtotal' => $request->subtotal,
            'total' => $request->total,
            'total_ppn' => $request->total_ppn,
        ]);

        return redirect('/transactions')->with('status', 'Transaksi Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        return view('transactions.edit', [
            'transaction' => Transaction::findOrFail($transaction->id),
            'customers' => Customer::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        $rules = [
            'customer_id' => 'required',
            'price' => 'required',
            'qty' => 'required',
        ];

        
        if($request->product != $transaction->product){
            $rules['product'] = 'required';
        }

        $validatedData = $request->validate($rules);

        Transaction::where('id', $transaction->id)->update($validatedData);

        return redirect('/transactions')->with('status', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        Transaction::destroy($transaction->id);

        return redirect('/transactions')->with('status', 'Data berhasil dihapus');
    }
}
