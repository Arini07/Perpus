@extends('layouts.index')
@section('judul_konten', 'user')

@section('content')
<div class="container">
@if($message = Session::get('success'))
                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>{{$message}}</strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
       

        <a href="{{ route('user.create') }}" class="btn btn-success btn-md m-4">
            <i class="fa fa-plus"></i> Tambah User
        </a>

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Level</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($user as $users)
                    <tr>
                        <td valign="middle">{{ $loop->iteration }}</td>
                        <td valign="middle">{{ $users->name }}</td>
                        <td valign="middle">{{ $users->nama_lengkap }}</td>
                        <td valign="middle">{{ $users->email }}</td>
                        <td valign="middle">{{ ucfirst($users->hasRole()->value('role')) }}</td>
                        <td valign="middle">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <!-- Tombol Edit dengan ikon -->
                                    <a href="{{ route('user.edit', $users->id) }}" class="btn btn-sm btn-secondary mx-1 shadow" title="Edit">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                </div>

                                <form method="POST" action="{{ route('user.destroy', $users->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <!-- Tombol Hapus dengan ikon -->
                                    <button type="submit" class="btn btn-danger btn-sm btn-delete">
                                        <i class="fas fa-trash-alt"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $user->links() }}
</div>

<script type="text/javascript">
    $(".btn-delete").click(function(e) {
        e.preventDefault();
        var form = $(this).parents("form");
        Swal.fire({
            title: "Konfirmasi Hapus User",
            text: "Apakah Anda Yakin Akan Menghapus User ini?",
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
</script>
@endsection
