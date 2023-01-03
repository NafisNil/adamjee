<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceiveBill extends Model
{
    use HasFactory;
    protected $fillable = ['date','month','tenants','cheque','dt_receive','amount'];

    public function user()
    {
        # code...
        return $this->belongsTo(User::class, 'tenants','id');
    }
}
