@extends('master')

@section('title','Tambah Berita')

@section('content')

<div class="container mt-5">

    <h2 class="mb-4">Tambah Berita</h2>

    <form action="{{ route('posts.store') }}" method="POST">

        @csrf

        <div class="mb-3">
            <label>Judul Berita</label>
            <input type="text" name="title" class="form-control">
        </div>

        <div class="mb-3">
            <label>Isi Berita</label>
            <textarea name="content" rows="6" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Nama Gambar</label>
            <input type="text" name="image" class="form-control">
            <small>Contoh: berita1.jpg</small>
        </div>

        <div class="mb-3">
            <label>Publisher</label>
            <input type="text" name="publisher" class="form-control">
        </div>

        <div class="mb-3">
            <label>Tanggal Berita</label>
            <input type="date" name="tanggal_berita" class="form-control">
        </div>

        <div class="mb-3">
            <label>Kategori</label>
            <input type="text" name="kategori" class="form-control">
        </div>

        <div class="mb-3">
            <label>Status Publish</label>

            <select name="published" class="form-control">

                <option value="yes">Yes</option>
                <option value="no">No</option>

            </select>

        </div>

        <button class="btn btn-primary">
            Simpan
        </button>

        <a href="{{ route('posts.index') }}" class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>

@endsection