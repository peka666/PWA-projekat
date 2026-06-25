@extends("layout")
@section("title")
    Korpa
@endsection

@section("content")
@if(count($ProizvodiUKorpi)!==0)
<h1 class = "mt-4">Vasa Korpa:</h1>
<div class = "col-md-8">
    <table class = "table table-striped">
        <thead>
            <tr>
                <th>Proizvod</th>
                <th>Kolicina</th>
                <th>Cena stavke</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ProizvodiUKorpi as $p)
                <tr>
                    <td>{{$p->proizvod->naziv}}</td>
                    <td>{{ $p->kolicina }}</td>
                    <td>{{ $p->proizvod->cena * $p->kolicina }} RSD</td>
                    <td>
                        <form action="/dodajUKorpu" method="post">
                            @csrf
                            <input type="hidden" name="proizvod_id" value="{{ $p->proizvod->id }}">
                            <button type="submit" class="btn btn-success"><i class="bi bi-plus-lg"></i></button>
                        </form>
                    </td>
                    <td>
                        <form action="/oduzmiIzKorpe" method="post">
                            @csrf
                            <input type="hidden" name="proizvod_id" value="{{ $p->proizvod->id }}">
                            <button type="submit" class="btn btn-warning"><i class="bi bi-dash-lg"></i></button>
                        </form>
                    </td>
                    <td>
                        <form action="/obrisiIzKorpe" method="post">
                            @csrf
                            <input type="hidden" name="proizvod_id" value="{{ $p->proizvod->id }}">
                            <button type="submit" class="btn btn-danger"><i class="bi bi-x-lg"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<hr>
<h2 class = "mb-3">Ukupno za placanje: {{$ukupno}} RSD</h2>
<form action = "/naruci" method = "post" onsubmit="return Potvrdi(event)">
    @csrf
    <input type = "hidden" name = "ukupno" value = "{{ $ukupno }}">
    <div class = "col-md-3">
        <b>Adresa:</b>
        <input type = "text" class = "form-control" name = "adresa" required minlength='8'>
    </div>
    <button type="submit" class = "btn btn-success mt-4">Poruci <i class="bi bi-scooter"></i></button>
</form>

@else
<h1 class = "mt-4 mb-4">Vasa korpa je trenutno prazna, narucite odmah!</h1>
<a href = "/jelovnik" class = "btn btn-success">Vidi jelovnik <i class="bi bi-arrow-right"></i></a>
@endif

<script>
    function Potvrdi(event) {
        Swal.fire({
            title: 'Potvrda!',
            text: 'Da li ste sigurni da zelite da porucite?',
            icon: 'success',
            showCancelButton: true,
            confirmButtonColor: '#35dc51',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Da, Zelim da narucim',
            cancelButtonText: 'Otkazi'
        }).then((result) => {
            if (result.isConfirmed) {
                event.target.submit(); 
            }
        });
        
        return false; 
    }
</script>
@endsection