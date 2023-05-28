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
        return $this->belongsToMany(Import::class)->withPivot('details', 'total_amount');
    }

    public function exports() : BelongsToMany {
        return $this->belongsToMany(Export::class)->withPivot('details', 'total_amount');
    }

    public function supplier() : HasOne {
        return $this->hasOne(Supplier::class);
    }

    protected function details(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value, true),
        );
    } 
}