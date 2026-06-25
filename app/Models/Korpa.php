<?php

namespace App\Models;

use App\Models\Proizvod;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Korpa extends Model
{
    
    protected $fillable = ['user_id','proizvod_id','kolicina','ukupno',];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function proizvod()
    {
        return $this->belongsTo(Proizvod::class);
    }
}
