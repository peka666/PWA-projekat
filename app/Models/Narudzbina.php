<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Narudzbina extends Model
{
    protected $fillable = ["user_id", "ukupno", "datum", "adresa"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
