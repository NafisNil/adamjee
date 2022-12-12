<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Water extends Model
{
    use HasFactory;
    protected $fillable = ['building', 'tenants', 'c_fromdate','c_todate', 'c_measurement', 'c_totalmonth', 'c_rate', 'd_fromdate','d_todate','d_measurement','d_totalmonth','d_rate','total_bill','totalpay','totaldue'];
}
