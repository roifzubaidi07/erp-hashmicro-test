<?php

namespace App\Models;

use App\Models\Company;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Company
{
    protected $guarded = ['id'];
}
