<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Korpa;
use App\Models\Narudzbina;
use App\Models\Naruzdbina;
use App\Models\Proizvod;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KorpaController extends Controller
{
    public function vidiKorpu(){
        
        $user = Auth::user();
        if(!$user){
            return redirect('/pocetna');
        }
        $korpa = Korpa::where("user_id", $user->id)->get();
        $ukupno = 0;
        foreach($korpa as $k){
            $ukupno = $ukupno + ($k->proizvod->cena * $k->kolicina);
        }
        return view("korpa", ["ProizvodiUKorpi" => $korpa, "ukupno" => $ukupno]);
    }
    public function dodajUKorpu(Request $request){
        $user = Auth::user();
        $proizvod = Proizvod::find($request->proizvod_id);
        
        if (!$proizvod) {
            return redirect()->back()->with('error', 'Proizvod nije pronađen.');
        }
        
        $KorpaProizvod = Korpa::where('user_id', $user->id)
                       ->where('proizvod_id', $request->proizvod_id)
                       ->first();
        
        if ($KorpaProizvod) {
            $KorpaProizvod->kolicina += 1;
            $KorpaProizvod->save();
        } 
        else {
            Korpa::create([
                'user_id' => $user->id,
                'proizvod_id' => $request->proizvod_id,
                'kolicina' => 1,
            ]); 
        }
        return redirect()->back();
    }
    public function obrisiIzKorpe(Request $request){
        $user = Auth::user();
        Korpa::where("user_id", $user->id)->where("proizvod_id", $request->proizvod_id)->delete();
        return redirect()->back();
    }

    public function oduzmiIzKorpe(Request $request){
        $user =  Auth::user();
        $KorpaProizvod = Korpa::where('user_id', $user->id)->where('proizvod_id', $request->proizvod_id)->first();


        if($KorpaProizvod->kolicina==1){
            Korpa::where("user_id", $user->id)->where("proizvod_id", $request->proizvod_id)->delete();
            return redirect()->back();
        }
        else{
            $KorpaProizvod->kolicina -= 1;
            $KorpaProizvod->save();
            return redirect()->back();
        }
    }

    public function naruci(Request $request){
        $user = Auth::user();
        $sada = new DateTime();
        Narudzbina::create(['user_id' => $user->id, 'ukupno' => $request->ukupno, "datum" => $sada, 'adresa' => $request->adresa]); 
        Korpa::where("user_id", $user->id)->delete();
        return "Vasa porudzbina je primljena uskoro ce stici do vas <a href = '/pocetna'>Idi nazad na pocetnu</a>";
    }
}
