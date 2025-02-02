<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteDetails extends Model
{
    use HasFactory;
    protected $fillable = ['*'];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
