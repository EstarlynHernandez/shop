<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'product_id',
        'user_id',
        'items',
        'prize',
    ];

    

    public function product(): BelongsTo{
        return $this->belongsTo(Product::class);
    }    
}
