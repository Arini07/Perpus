@extends('layouts.index')
@section('judul_konten', 'Data Buku')

@section('content')
<div class="container">
    <div class="card-body">
        @if($message = Session::get('success'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <a href="{{ Route('buku.create') }}" class="btn btn-success btn-md m-4">
            <i class="fa fa-plus"></i> Tambah Buku
        </a>

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                    <th>Kategori</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bukus as $data)
                    <tr>
                         <td valign="middle">{{ $loop->iteration }}</td>
                         <td valign="middle">{{ $data->judul }}</td>
                         <td valign="middle">{{ $data->penulis }}</td>
                         <td valign="middle">{{ $data->penerbit }}</td>
                         <td valign="middle">{{ $data->tahun_terbit }}</td>
                         <td valign="middle">{{ $data->buku_kategori->nama_kategori }}</td>
                         <td valign="middle">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <a href="{{ route('buku.edit', $data->id) }}" class="btn btn-sm btn-secondary mx-1 shadow" title="Edit">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                            </div>
                            <form action="{{ route('buku.destroy', $data->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm btn-secondary mx-1 shadow">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </button>
                            </form>
                        </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
    document.querySelectorAll(".btn-delete").forEach(button => {
        button.addEventListener("click", function(e) {
            e.preventDefault();
            const form = this.closest("form");
            Swal.fire({
                title: "Konfirmasi Hapus Buku",
                text: "Apakah Anda yakin akan menghapus buku ini?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Hapus!"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
@endsection
