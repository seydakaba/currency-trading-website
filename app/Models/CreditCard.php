<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreditCard extends Model
{
    use HasFactory;
  
    protected $table = 'credit_cards';

    public function user()
    {
        return $this->belongsTo(User::class, 'UserID');
    }
}


