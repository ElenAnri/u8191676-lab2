<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'city',
        'streetOrMicrodistrict',
        'building',
        'floor',
        'flat',
        'intercomCode',
        'buyer_id'
    ];


    public function buyer()
    {
        $this->belongsTo(Buyer::class);
    }
}
