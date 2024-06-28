<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;
    protected $fillable = ['*'];

    public function quoteDetails(){
        return $this->hasMany(QuoteDetails::class);
    }

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
