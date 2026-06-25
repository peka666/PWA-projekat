@extends("layout")
@section("title")
    Proizvod
@endsection

@section("content")
    <h1 class = 'mt-5 mb-5'>{{ $proizvod->naziv }}</h1>

    <div style="width: 300px; height: 300px;" class="mb-4">
        @php
            use Illuminate\Support\Facades\Storage;
            
            $imagePath = $proizvod->slika ?? '';
            $hasImage = !empty($imagePath) && Storage::disk('public')->exists($imagePath);
        @endphp
        
        @if($hasImage)
            <img src="{{ asset('storage/' . $imagePath) }}" 
                style="width: 100%; height: 100%; object-fit: cover;" 
                alt="{{ $proizvod->naziv }}">
        @else
            <div style="width: 100%; height: 100%; background: #e9ecef; display: flex; align-items: center; justify-content: center; color: #6c757d;">
                Slika nije dostupna
            </div>
        @endif
    </div>
    <h4>Opis</h4
    <textarea class = "form-control" name = {{$proizvod->opis}} readonly >{{$proizvod->opis}}</textarea>
    <br>
    <div class = "col-md-1 mt-4">
        <b>Cena</b>:
        <input type = "text" value = "{{ $proizvod->cena }} RSD" class = "form-control"> 
    </div>

    <div class="d-flex gap-3 align-items-center mt-3">
        @auth
            @if(Auth::user()->tip === "registered")
                <form action="/dodajUKorpu" method="post">
                    @csrf
                    <input type="hidden" name="proizvod_id" value="{{ $proizvod->id }}">
                    <button class="btn btn-success">Dodaj u korpu</button>
                </form>
            @endif
            @if(Auth::user()->tip === "admin" || Auth::user()->tip === "editor")
                <a href = "/izmeniProizvod/{{ $proizvod->id }}" class = "btn btn-secondary">Izmeni <i class="bi bi-brush-fill"></i></a>
            @endif
        @endauth
        <a href="/jelovnik" class="btn btn-primary">
            <i class="bi bi-arrow-90deg-left"></i>&nbsp;Jelovnik
        </a>
    </div>
    
@endsection
