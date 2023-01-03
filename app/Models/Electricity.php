<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Electricity extends Model
{
    use HasFactory;
    protected $fillable = ['customer_info','time','current_read','current_date','account','previous_read','previous_date','meter_no','unit','issue_date','last_date','current_price','service_charged','electricity_tax','demand_charge','electricity_vat','c_sub_total','d_fromdate','d_todate','due_balance','surcharge','d_sub_total','total_intime','total_outtime'];

    public function user()
    {
        # code...
        return $this->belongsTo(User::class, 'customer_info','id');
    }
}
