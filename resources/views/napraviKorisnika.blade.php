@extends('layout')
@section("title")
Pravljenje korisnika
@endsection

@section("content")

<h1 class = "mt-4">Pravljenje korisnika</h1>

<form action = "/storujKorisnika" method="post">
    @csrf
    <div class = "col-md-3">
        Username:
        <input type="text" class = "form-control" name = "name" required minlength="4">
    </div>
    <div class = "col-md-3">
        Email:
        <input type="email" class = "form-control" name = "email" required minlength="7">
    </div>
    <div class = "col-md-3">
        Password:
        <input type="password" class = "form-control" name = "password" required minlength="5">
    </div>
    <div class = "col-md-3 mb-3">
        Potvrda password:
        <input type="password" class = "form-control" name = "password_confirm" required minlength="5">
    </div>
    @auth
    @php $user = Auth::user(); @endphp
        @if($user->tip === "admin")
            <div class="col-md-2">
                Tip:
                <select class = "form-select" name = "tip">
                    <option value = "registered">User</option>
                    <option value = "editor">Editor</option>
                    <option value = "admin">Admin</option>
                </select>
            </div>
            <button class = "btn btn-primary mt-3">Napravi korisnika</button>
        @endif
    @endauth
    @guest
        <button class = "btn btn-primary mt-3">Registruj se</button>
    @endguest
</form>

@endsection