@extends("layout")
@section("title")
    Pocetna
@endsection

@section("content")
    @guest
        <h1 class = "mt-4">Nemate nalog, registrujte se</h1>
        <a href =  "/napraviKorisnika" class = "btn btn-success">Registruj se</a>
    @endguest
    <h1 class="mt-5 mb-5">Izdvajamo iz ponude</h1>
    <ul class="list-group col-md-6">
        @foreach ($proizvodi as $p)
        <li class="list-group-item mb-3 d-flex align-items-center" style="font-weight:700">
        <span class="me-auto">{{$p->naziv}}</span>
        
        <a href="/proizvod/{{ $p->id }}" class="btn btn-primary me-2">Opsirnije <i class="bi bi-arrow-right"></i></a>
            
        @auth 
            @if(Auth::user()->tip === "admin" || Auth::user()->tip === "editor") 
                <a href="/izmeniProizvod/{{ $p->id }}" class="btn btn-secondary me-2">Izmeni <i class="bi bi-brush-fill"></i></a>
                
                <form method="post" action="/obrisiProizvod" class="d-inline delete-form">
                    @csrf
                    <input type="hidden" name="id" value="{{ $p->id }}">
                    <button type="button" class="btn btn-danger" onclick="confirmDelete(this, '{{ $p->naziv }}')">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </form>
            @endif
        @endauth
        </li>
    @endforeach

<script>
    function confirmDelete(button, name) {
    Swal.fire({
        title: 'Da li ste sigurni?',
        text: `Zelite da obrisete proizvod "${name}"?`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dc3545',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Da, obrisi!',
        cancelButtonText: 'Otkazi'
    }).then((result) => {
        if (result.isConfirmed) {
            button.closest('form').submit();
        }
    });
}
</script>
@endsection