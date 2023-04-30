<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExchangeRate extends Model
{
    protected $fillable = [
        'currency_id',
        'currency',
        'rate',
    ];

    protected $primaryKey = 'currency_id';
    
    public $incrementing = true;
    
}