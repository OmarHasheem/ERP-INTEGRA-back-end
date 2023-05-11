<?php

namespace App\Models\Repository;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Supplier extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function products() : BelongsTo {
        return $this->belongsTo(Product::class);
    }    

    public function imports() : BelongsTo {
        return $this->belongsTo(Product::class);
    }
}