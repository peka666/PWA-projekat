@extends("layout")
@section("title")
Admin Panel
@endsection

@section("content")
<h1 class = "mt-4">Admin</h1>
<div class="d-flex gap-3 align-items-center mt-3">
    <a href = "/grafikoni" class = "btn btn-primary">Grafikoni <i class="bi bi-bar-chart-fill"></i></a>
    <a href = "/korisnici" class = "btn btn-danger">Korisnici <i class="bi bi-person-circle"></i></a>
    <a href = "/napraviKorisnika" class = "btn btn-success">Napravi novog korisnika <i class="bi bi-plus-lg"></i></a>
    <a href = "/jelovnik" class = "btn btn-secondary">Izmeni proizvode <i class="bi bi-brush-fill"></i></a>
    <a href = "/dodavanjeProizvoda" class = "btn btn-success">Napravi novi proizvod <i class="bi bi-plus-lg"></i></a>
</div>
@endsection