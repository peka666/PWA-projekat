@extends("layout")
@section("title")
    Korisnici
@endsection

@section("content")

<h1 class = "mt-4">Svi korisnici</h1>
    <ul class="list-group col-md-3">
        <table class = "table table-striped">
            <thead>
                <tr>
                    <th>Br.</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Tip</th>
                </tr>
            </thead>
            <tbody>
                @foreach($korisnici as $index => $korisnik)
                    <tr>
                        <td>{{ $index + 1 }}</td> 
                        <td>{{ $korisnik->name }}</td>
                        <td>{{ $korisnik->email }}</td>
                        <td>{{ $korisnik->tip }}</td>
                        <td>
                            <form action="/obrisiKorisnika" method="post" class="delete-form">
                                @csrf
                                <input type="hidden" name="id" value="{{ $korisnik->id }}">
                                <button type="button" class="btn btn-danger" onclick="confirmDelete(this, '{{ $korisnik->name }}')">
                                    <i class="bi bi-x-lg"></i>
                                </button>
                            </form>
                        </td>
                        <script>
                        function confirmDelete(button, name) {
                            Swal.fire({
                                title: 'Da li ste sigurni?',
                                text: `Zelite da obrisete korisnika "${name}"?`,
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
                    </tr>
                @endforeach
            </tbody>
        </table>
    </ul>
@endsection