<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proizvod extends Model
{
    protected $fillable = ["naziv", "opis", "cena" ,'slika',"izdvojeno"];
}
