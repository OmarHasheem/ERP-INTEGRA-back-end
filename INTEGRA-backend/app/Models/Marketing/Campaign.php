<?php

namespace App\Models\Marketing;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function tvs() {
        return $this->hasMany(Tv::class);
    }

    public function socialmedias() {
        return $this->hasMany(SocialMedia::class);
    }

    public function events() {
        return $this->hasMany(Event::class);
    }

    public function PDFs() {
        return $this->hasMany(PDFFile::class);
    }

    public function leads() {
        return $this->belongsToMany(Lead::class);
    }
}
