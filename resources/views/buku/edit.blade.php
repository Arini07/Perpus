@extends('layouts.index')
@section('judul_konten','Edit Buku')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{ route('buku.update', $buku->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="judul" class="col-md-4 col-form-label text-md-end">{{ __('Judul') }}</label>
                            <div class="col-md-6">
                                <input id="judul" type="text" value="{{ old('judul', $buku->judul) }}" 
                                       class="form-control @error('judul') is-invalid @enderror" 
                                       name="judul" required>
                                @error('judul')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="tahun_terbit" class="col-md-4 col-form-label text-md-end">{{ __('Tahun Terbit') }}</label>
                            <div class="col-md-6">
                                <input id="tahun_terbit" type="text" value="{{ old('tahun_terbit', $buku->tahun_terbit) }}" 
                                       class="form-control @error('tahun_terbit') is-invalid @enderror" 
                                       name="tahun_terbit" required>
                                @error('tahun_terbit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="penerbit" class="col-md-4 col-form-label text-md-end">{{ __('Penerbit') }}</label>
                            <div class="col-md-6">
                                <input id="penerbit" type="text" value="{{ old('penerbit', $buku->penerbit) }}" 
                                       class="form-control @error('penerbit') is-invalid @enderror" 
                                       name="penerbit" required>
                                @error('penerbit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="penulis" class="col-md-4 col-form-label text-md-end">{{ __('Penulis') }}</label>
                            <div class="col-md-6">
                                <input id="penulis" type="text" value="{{ old('penulis', $buku->penulis) }}" 
                                       class="form-control @error('penulis') is-invalid @enderror" 
                                       name="penulis" required>
                                @error('penulis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="buku_kategori_id" class="col-md-4 col-form-label text-md-end">{{ __('Kategori') }}</label>
                            <div class="col-md-6">
                                <select id="buku_kategori_id" name="buku_kategori_id" 
                                        class="form-control @error('buku_kategori_id') is-invalid @enderror" required>
                                    <option value="">Pilih Kategori</option>
                                    @foreach($bukuKategoris as $kategori)
                                        <option value="{{ $kategori->id }}" 
                                                {{ old('buku_kategori_id', $buku->buku_kategori_id ?? '') == $kategori->id ? 'selected' : '' }}>
                                            {{ $kategori->nama_kategori }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('buku_kategori_id')
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