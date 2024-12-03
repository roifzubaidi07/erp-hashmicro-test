<?php

namespace App\Models;

use App\Models\Customer;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded = ['id'];

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
    public function suppliers()
    {
        return $this->hasMany(Supplier::class);
    }
}
