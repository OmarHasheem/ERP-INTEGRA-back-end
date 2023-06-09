<?php

namespace App\Models\Repository;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category() : HasMany {
        return $this->hasMany(Category::class);
    }

    public function imports() : BelongsToMany {
        return $this->belongsToMany(Import::class)->withPivot('details', 'total_amount' , 'quantity');
    }

    public function exports() {
        return $this->belongsToMany(Export::class)->withPivot('details', 'total_amount' , 'quantity');
    }

    public function supplier() : HasOne {
        return $this->hasOne(Supplier::class);
    }

    public function details() : HasMany {
        return $this->hasMany(ProductDetail::class);
    }
}