@extends('layouts.index')
@section('judul_konten','Peminjaman')

@section('content')
<div class="container">
    <div class="card-body">
    @if($message = Session::get('success'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <a href="{{ route('peminjaman.create') }}" class="btn btn-success btn-md m-4">
            <i class="fa fa-plus"></i> Tambah Peminjaman
        </a>

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID Peminjaman</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Status Peminjaman</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($peminjaman as $pinjam)
                <tr>
                    <td valign="middle">{{ $loop->iteration }}</td>
                    <td valign="middle">{{ $pinjam->user->name }}</td> <!-- Sesuaikan nama kolom jika ID berbeda -->
                    <td valign="middle">{{ $pinjam->buku->judul}}</td>  <!-- Cek apakah buku null -->
                    <td valign="middle">{{ $pinjam->tanggal_peminjaman }}</td>
                    <td valign="middle">{{ $pinjam->tanggal_pengembalian }}</td>
                    <td valign="middle">{{ $pinjam->status_peminjaman }}</td>
                    <td valign="middle">
                    <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <a href="{{ route('peminjaman.edit', $pinjam->id) }}" class="btn btn-sm btn-secondary mx-1 shadow" title="Edit">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                            </div>
                            <form action="{{ route('peminjaman.destroy', $pinjam->id) }}" method="POST">
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
    document.querySelectorAll('.btn-delete').forEach((button) => {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            const form = this.closest('form');
            Swal.fire({
                title: "Konfirmasi Hapus Peminjaman",
                text: "Apakah Anda yakin akan menghapus peminjaman ini?",
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
