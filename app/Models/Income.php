<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
use HasFactory;

    protected $fillable = [
        'category_id', 
        'amount', 
        'description', 
        'date',
        'is_validated',
        'status', 
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

        protected $casts = [
        'date' => 'datetime',
    ];
}
