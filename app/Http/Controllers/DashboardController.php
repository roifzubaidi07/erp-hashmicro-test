<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $customers = Customer::all();
        $transactions = Transaction::all();
 
        return view('dashboard', 
        [
            'customers' => $customers,
            'transactions' => $transactions,
        ]);
    }
}
