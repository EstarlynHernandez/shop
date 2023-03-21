<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class table extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name',
        'field_1',
        'field_2',
        'field_3',
        'field_4',
        'field_5',
        'field_6',
        'field_7',
        'field_8',
        'field_9',
        'field_10',
        'field_11',
        'field_12',
        'field_13',
        'field_14',
        'field_15',

    ];   

    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
            // 'description' => $this->description,
        ];
    }
}
