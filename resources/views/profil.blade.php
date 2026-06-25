@extends("layout")
@section("title")
Profil
@endsection
@section("content")

<h1 class = "mt-4">Zdravo, {{$user->name}}</h1>
<div class="d-flex gap-3 float-end">
    <a href="/profile" class="btn btn-primary">Izmeni</a>
    
    <form method="post" action="/logout">
        @csrf
        <button class="btn btn-danger">Logout</button>
    </form>
</div>
<h3 class = "mt-3">Informacije</h3>

<div class = "col-md-2">
    Username:
    <input type="text" value = "{{ $user->name }}" readonly class = "form-control">
</div>
<div class = "col-md-3">
    Email:
    <input type="text" value = "{{ $user->email }}" readonly class = "form-control">
</div>
<div class = "col-md-2">
    Tip:
    <input type="text" value = "{{ $user->tip }}" readonly class = "form-control">
</div>
@if(Auth::user()->tip === "registered")
<h1 class = "mt-4">Istorija porudzbina</h1>
<div class = "col-md-7">
    <table class = "table table-striped">
        <thead>
            <tr>
                <th>br.</th>
                <th>Datum</th>
                <th>Ukupno</th>
                <th>Adresa</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($porudzbine as $index => $p)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$p->datum}}</td>
                    <td>{{$p->ukupno}} RSD</td>
                    <td>{{$p->adresa}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif
@endsection