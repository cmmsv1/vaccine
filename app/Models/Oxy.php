<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oxy extends Model
{
    use HasFactory;
    protected $table = 'oxies';

    public function oxy_producer()
    {
        return $this->belongsTo(OxyProducer::class);
    }
}
