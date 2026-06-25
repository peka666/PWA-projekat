@extends("layout")
@section("title")
    Izmena Proizvoda
@endsection

@section("content")

<h1 class = "mt-4">Izmena proizvoda</h1>

<form action = "/storujProizvod" method = "post" enctype="multipart/form-data">
    @csrf
    <input type = "hidden" name = "id" value = "{{ $proizvod->id }}">
    <div class="col-md-3 mt-2">
        <b>Naziv:</b>  
        <input type="text" class = "form-control" name = "naziv" value = "{{ $proizvod->naziv }}" required>
    </div>
    <div class="col-md-3 mt-2">
        <b>Opis:</b> 
        <textarea class = "form-control" name = "opis" style="height: 15em;" minlength="10">{{ $proizvod->opis }}</textarea>
    </div>
    <div class="col-md-1 mt-2">
        <b>Cena:</b> 
        <input type="number" class = "form-control" name = "cena" value = "{{ $proizvod->cena }}" required min = "100">
    </div>
    <div class="col-md-1 mt-2">
        <label for="slika">Slika proizvoda</label>
        <input type="file" name="slika" class = "form-control" accept="image/*" value = '{{ $proizvod->slika }}'>
    </div>
    <div class="col-md-3 mt-2">
        <b>Izdvojeno:</b>
        <input type="radio" class="form-radio" id="izdvojeno" name="izdvojeno" value="izdvojeno" @checked($proizvod->izdvojeno === "izdvojeno") required>
        <label for="izdvojeno_da">Da</label>
        
        <input type="radio" class="form-radio" id="izdvojeno" name="izdvojeno" value="ne" @checked($proizvod->izdvojeno === "Ne") required>
        <label for="izdvojeno_ne">Ne</label>
    </div>
    <button class = "btn btn-primary mt-4">Izmeni</button>
</form>

@endsection