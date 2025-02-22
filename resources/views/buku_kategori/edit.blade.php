edit.blade.php kategori

@extends('layouts.index')
@section('judul_konten','Edit Kategori Buku')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Kategori</div>
                <div class="card-body">
                    <form method="post" action="{{ route('buku_kategori.update', $kategori->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="nama_kategori" class="col-md-4 col-form-label text-md-end">{{ __('Nama Kategori') }}</label>
                            <div class="col-md-6">
                                <input id="nama_kategori" type="text" value="{{ $kategori->nama_kategori }}" 
                                class="form-control @error('nama_kategori') is-invalid @enderror" 
                                name="nama_kategori" required>
                                
                                @error('nama_kategori')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Simpan') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
