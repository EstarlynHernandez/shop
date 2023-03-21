<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Product;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Laravel\Scout\Searchable;

class Type extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name',
        'description',
        'table'
    ];

    public function product(): HasOne{
        return $this->hasone(Product::class);
    }

    public function table(): BelongsTo{
        return $this->belongsTo(Table::class);
    }    

    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
            // 'description' => $this->description,
        ];
    }
}
