<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OxyProducer extends Model
{
    use HasFactory;
    protected $table = 'oxy_producers';

    public function oxies()
    {
        return $this->hasMany(Oxy::class);
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($category) { // before delete() method call this
            $category->products()->delete();
            // do the rest of the cleanup...
        });
    }
}
