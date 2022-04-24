<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterVaccine extends Model
{
    use HasFactory;
    public function date_of_injection()
    {
        return $this->belongsTo(DateOfInjection::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
