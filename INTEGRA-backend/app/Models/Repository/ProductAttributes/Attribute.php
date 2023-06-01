<?php

namespace App\Models\Repository\ProductAttributes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Attribute extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function attributeValues() : HasMany {
        return $this->hasMany(AttributeValue::class);
    }

    public function attributeGroup() : BelongsTo {
        return $this->belongsTo(AttributeGroup::class);
    }
}
