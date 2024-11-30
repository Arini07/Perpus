@extends('layouts.index')
@section('judul_konten', 'Edit Peminjaman')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Peminjaman</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('peminjaman.update', $peminjaman->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- Dropdown User -->
                        <div class="row mb-3">
                            <label for="user_id" class="col-md-4 col-form-label text-md-end">{{ __('User') }}</label>
                            <div class="col-md-6">
                                <select id="user_id" name="user_id" class="form-select @error('user_id') is-invalid @enderror" required>
                                    <option value="">Pilih User</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" {{ $peminjaman->user_id == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Dropdown Buku -->
                        <div class="row mb-3">
                            <label for="buku_id" class="col-md-4 col-form-label text-md-end">{{ __('Buku') }}</label>
                            <div class="col-md-6">
                                <select id="buku_id" name="buku_id" class="form-select @error('buku_id') is-invalid @enderror" required>
                                    <option value="">Pilih Buku</option>
                                    @foreach($bukus as $buku)
                                        <option value="{{ $buku->id }}" {{ $peminjaman->buku_id == $buku->id ? 'selected' : '' }}>
                                            {{ $buku->judul }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('buku_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Input Tanggal Peminjaman -->
                        <div class="row mb-3">
                            <label for="tanggal_peminjaman" class="col-md-4 col-form-label text-md-end">{{ __('Tanggal Peminjaman') }}</label>
                            <div class="col-md-6">
                                <input id="tanggal_peminjaman" type="date" class="form-control @error('tanggal_peminjaman') is-invalid @enderror" name="tanggal_peminjaman" value="{{ $peminjaman->tanggal_peminjaman }}" required>
                                @error('tanggal_peminjaman')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Input Tanggal Pengembalian -->
                        <div class="row mb-3">
                            <label for="tanggal_pengembalian" class="col-md-4 col-form-label text-md-end">{{ __('Tanggal Pengembalian') }}</label>
                            <div class="col-md-6">
                                <input id="tanggal_pengembalian" type="date" class="form-control @error('tanggal_pengembalian') is-invalid @enderror" name="tanggal_pengembalian" value="{{ $peminjaman->tanggal_pengembalian }}">
                                @error('tanggal_pengembalian')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Input Status Peminjaman -->
                        <div class="row mb-3">
                            <label for="status_peminjaman" class="col-md-4 col-form-label text-md-end">{{ __('Status Peminjaman') }}</label>
                            <div class="col-md-6">
                                <input id="status_peminjaman" type="text" class="form-control @error('status_peminjaman') is-invalid @enderror" name="status_peminjaman" value="{{ $peminjaman->status_peminjaman }}" required>
                                @error('status_peminjaman')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Peminjaman') }}
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
