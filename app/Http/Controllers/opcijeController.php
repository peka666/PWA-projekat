<?php

namespace App\Http\Controllers;

use App\Models\Proizvod;
use Illuminate\Http\Request;

class opcijeController extends Controller
{
    public function pocetna(){
        $proizvodi = Proizvod::where('izdvojeno', 'izdvojeno')->get();
        return view('pocetna', ['proizvodi' => $proizvodi]);
    }
    public function proizvod(Request $request){
        $proizvod = Proizvod::where("id", $request->id)->first();
        return view("proizvod", ["proizvod" => $proizvod]);
    }
    public function jelovnik(){
        $proizvodi = Proizvod::all();
        return view('jelovnik', ["proizvodi" => $proizvodi]);
    }

    public function pretraga(Request $request){
        $query = $request->input('query');
        
        $proizvodi = Proizvod::where('naziv', 'LIKE', "%{$query}%")
                    ->orWhere('naziv', 'LIKE', "%{$query}%") 
                    ->get();
        
        return view('jelovnik', compact('proizvodi', 'query'));
    }

    public function kontakt(){
        return view('kontakt');
    }
}
