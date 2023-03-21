<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name',
        'description',
        'prize',
        'type_id',
        'category_id',
        'subcategory_id',
        'table_id',
        'images',
        'amount',
    ];

    public function type(): BelongsTo{
        return $this->belongsTo(Type::class);
    }

    public function category(): BelongsTo{
        return $this->belongsTo(Category::class);
    }

    public function subcategory(): BelongsTo{
        return $this->belongsTo(Subcategory::class);
    }

    public function table(): BelongsTo{
        return $this->belongsTo(Table::class);
    }    

    public function images(){
        if($this->images){
            return explode('/-img-/', $this->images);;
        }
        
        return ['placeholder', 'placeholder'];
    }

    public function cart(): HasOne{
        return $this->hasOne(Cart::class);
    }

    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
            // 'description' => $this->description,
        ];
    }
}
