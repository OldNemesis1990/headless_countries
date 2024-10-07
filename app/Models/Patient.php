<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;

class Patient extends Model
{
    use HasFactory;

    public function country() {
        return $this->belongsTo(Country::class);
    }
}
