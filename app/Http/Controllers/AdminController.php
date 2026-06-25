<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    private function proveriAdmina()
    {
        if (!Auth::user()) {
            return redirect('/pocetna');
        }
        
        if (Auth::user()->tip !== 'admin') {
            return redirect('/pocetna');
        }
        
        return null; 
    }

    public function adminPanel()
    {
        $redirect = $this->proveriAdmina();
        if ($redirect) {
            return $redirect;
        }
        
        return view("adminPanel");
    }

    public function korisnici()
    {
        $redirect = $this->proveriAdmina();
        if ($redirect) {
            return $redirect;
        }
        
        $korisnici = User::whereNot('id', auth()->id())->get();
        return view("korisnici", ['korisnici' => $korisnici]);
    }

    public function obrisiKorisnika(Request $request)
    {
        $redirect = $this->proveriAdmina();
        if ($redirect) {
            return $redirect;
        }
        $user = User::find($request->id);
        $user->narudzbinas()->delete();
        $user->korpas()->delete();
        $user->delete();
        return redirect()->back();
    }

    public function napraviKorisnika(){
        return view("napraviKorisnika");
    }

    public function storujKorisnika(Request $request){
        $polja = $request->validate([
            'name' => ['required', 'min:4'],
            'email' => ['required', 'min:7'],
            'password' => ['required', 'min:5'],
        ]);
        if($polja['password'] !== $request->password_confirm){
            return "Sifre moraju da se poklapaju";
        } 
        User::create($polja);
        return redirect()->back();
    }

    public function izmenaKorisnika(Request $request){
        $redirect = $this->proveriAdmina();
        if ($redirect) {
            return $redirect;
        }
        $korisnik = User::where("id", $request->id);
        return view("izmenaKorisnika", ["korisnik" => $korisnik]);
    }
}
