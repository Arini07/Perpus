@extends('layouts.index')
@section('judul_konten','Kategori Buku')

@section('content')
<div class="container">
    @if($message = Session::get('success'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <a href="{{ Route('buku_kategori.create') }}" class="btn btn-success btn-md m-4">
        <i class="fa fa-plus"></i> Tambah Kategori
    </a>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bukuKategoris as $data)
                <tr>
                    <td valign="middle">{{ $loop->iteration }}</td>
                    <td valign="middle">{{ $data->nama_kategori }}</td>
                    <td valign="middle">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <a href="{{ route('buku_kategori.edit', ['id' => $data->id]) }}" class="btn btn-sm btn-secondary mx-1 shadow" title="Edit">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                            </div>
                            <form action="{{ route('buku_kategori.destroy', ['id' => $data->id]) }}" method="POST">
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
    {{ $bukuKategoris->links() }}
</div>

<script type="text/javascript">
    $(".btn-delete").click(function(e) {
        e.preventDefault();
        var form = $(this).parents("form");
        Swal.fire({
            title: "Konfirmasi Hapus Kategori",
            text: "Apakah Anda Yakin Akan Menghapus Kategori ini?",
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
</script
@endsection
