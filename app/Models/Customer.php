<?php

namespace App\Models;

use App\Models\Company;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;

class Customer extends Company
{
    protected $guarded = ['id'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
