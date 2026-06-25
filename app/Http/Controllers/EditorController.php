<?php

namespace App\Http\Controllers;

use App\Models\Narudzbina;
use App\Models\Proizvod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EditorController extends Controller
{

    private function proveriAdmina()
    {
        if (!Auth::user()) {
            return redirect('/pocetna');
        }
        
        if (Auth::user()->tip !== 'admin' && Auth::user()->tip !== "editor") {
            return redirect('/pocetna');
        }
        
        return null; 
    }



    public function editorPanel(){

        $redirect = $this->proveriAdmina();
        if ($redirect) {
            return $redirect;
        }
        return view("editorPanel");
    }
    public function izmeniProizvod(Request $request){
        $redirect = $this->proveriAdmina();
        if ($redirect) {
            return $redirect;
        }
        $proizvod = Proizvod::where("id", $request->id)->first();
        return view("izmenaProizvoda", ["proizvod" => $proizvod]);
    }

    public function storujProizvod(Request $request){
        $request->validate([
            "naziv" => ['required', 'min:4', 'unique:proizvods,naziv,' . $request->id],
            "opis" => ['required', 'min:10'],
            "cena" => ['required', 'numeric', 'min:100'],
            'slika' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], 
            "izdvojeno" => ['required', 'in:izdvojeno,Ne'], 
        ]);

        $proizvod = Proizvod::findOrFail($request->id);
        $data = [
            'naziv' => $request->naziv,
            'opis' => $request->opis,
            'cena' => $request->cena,
            'izdvojeno' => $request->izdvojeno,
        ];
        
        if ($request->hasFile('slika') && $request->file('slika')->isValid()) {
            if ($proizvod->slika) {
                Storage::disk('public')->delete($proizvod->slika);
            }
            $slika = $request->file('slika')->store('proizvodi', 'public');
            $data['slika'] = $slika;
        } else {
            $data['slika'] = $proizvod->slika;
        }
        
        $proizvod->update($data);

        return redirect("/proizvod/{$request->id}")->with('success', 'Proizvod je uspešno ažuriran!');
    }

    public function dodavanjeProizvoda(){
        $redirect = $this->proveriAdmina();
        if ($redirect) {
            return $redirect;
        }
        return view("dodavanjeProizvoda");
    }

    public function dodavanjeProizvodaStorovanje(Request $request){
    $polja = $request->validate([
        "naziv" => ['required', 'min:4', 'unique:proizvods,naziv'],
        "opis" => ['required', 'min:10'],
        "cena" => ['required', 'numeric', 'min:100'],
        'slika' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], 
        "izdvojeno" => ['required'] 
    ]);

    $proizvod = Proizvod::create($polja); 

    if ($request->hasFile('slika')) {
        $slika = $request->file('slika')->store('proizvodi', 'public');
        $proizvod->slika = $slika; 
        $proizvod->save(); 
    }
    else {
        $polja['slika'] = null;
    }

        return redirect()->back();
    }

    public function obrisiProizvod(Request $request){
        $redirect = $this->proveriAdmina();
        if ($redirect) {
            return $redirect;
        }
        $id = $request->id;
        Proizvod::where("id", $id)->delete();
        return redirect()->back();
    }

    public function grafikoni(){
        $redirect = $this->proveriAdmina();
        if ($redirect) {
            return $redirect;
        }
        $data = Narudzbina::selectRaw('DATE_FORMAT(datum, "%Y-%m") as mesec, SUM(ukupno) as ukupno')
            ->groupBy('mesec')
            ->get();

        $array = [["Mesec", "Ukupno"]]; 

        foreach($data as $value){
            $array[] = [$value->mesec, (float)$value->ukupno];  
        }
        return view("grafikoni")->with("mesec", $array);
    }
}
