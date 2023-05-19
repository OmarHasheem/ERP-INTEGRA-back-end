<?php

namespace App\Models\Repository;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Import extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function products() : BelongsToMany {
        return $this->belongsToMany(Product::class)->withPivot('details', 'total_amount');
    }

    public function pdf(): HasOne {
        return $this->hasOne(PDFFile::class);
    }

    public function supplier(): HasOne {
        return $this->hasOne(Supplier::class);
    }
}
