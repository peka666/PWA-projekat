@extends("layout")
@section("title")
Dodavanje proizvoda
@endsection
@section("content")
<h1 class = "mt-4">Dodavanje Proizvoda</h1>

<form action = "/dodavanjeProizvodaStorovanje" method = "post" enctype="multipart/form-data">
    @csrf
    <div class="col-md-3 mt-2">
        <b>Naziv:</b>  
        <input type="text" class = "form-control" name = "naziv" required>
    </div>
    <div class="col-md-3 mt-2">
        <b>Opis:</b> 
        <textarea class = "form-control" name = "opis" style="height: 15em;" required minlength="10"></textarea>
    </div>
    <div class="col-md-1 mt-2">
        <b>Cena:</b> 
        <input type="number" class = "form-control" name = "cena" required min = "100">
    </div>
    <div class="col-md-1 mt-2">
        <label for="slika">Slika proizvoda</label>
        <input type="file" name="slika" class = "form-control" accept="image/*">
    </div>
    <div class="col-md-3 mt-2">
        <b>Izdvojeno:</b>
        <input type="radio" class="form-radio" id="izdvojeno" name="izdvojeno" value="izdvojeno" required>
        <label for="izdvojeno">Da</label>
        
        <input type="radio" class="form-radio" id="izdvojeno" name="izdvojeno" value="ne" required>
        <label for="izdvojeno">Ne</label>
    </div>
    <button class = "btn btn-primary mt-4">Dodaj</button>
</form>


@endsection