@extends('layouts.app')

@section('title', 'Tambah Berita')

@section('content')
<div class="container my-5" style="max-width:800px">
    <h2 class="teko fw-bold mb-4">Tambah Berita</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('berita.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" name="judul" value="{{ old('judul') }}" class="form-control">
        </div>
        <div class="row">
            <div class="col-md-4 mb-3">
                <label class="form-label">Kategori</label>
                <input type="text" name="kategori" value="{{ old('kategori') }}" class="form-control">
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label">Tanggal</label>
                <input type="date" name="tanggal" value="{{ old('tanggal') }}" class="form-control">
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label">Penulis</label>
                <input type="text" name="penulis" value="{{ old('penulis') }}" class="form-control">
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">URL Gambar</label>
            <input type="text" name="gambar" value="{{ old('gambar') }}" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Ringkasan</label>
            <textarea name="ringkasan" rows="2" class="form-control">{{ old('ringkasan') }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Isi</label>
            <textarea name="isi" rows="6" class="form-control">{{ old('isi') }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Tag (pisahkan dengan koma)</label>
            <input type="text" name="tag" value="{{ old('tag') }}" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('berita.index') }}" class="btn btn-outline-secondary">Batal</a>
    </form>
</div>
@endsection
