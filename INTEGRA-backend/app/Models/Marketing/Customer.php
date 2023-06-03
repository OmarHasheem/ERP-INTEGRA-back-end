<?php

namespace App\Models\Marketing;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function lead() {
        return $this->belongsToMany(Lead::class);
    }

    public function exporst() {
        return $this->hasMany(Export::class);
    }
}
