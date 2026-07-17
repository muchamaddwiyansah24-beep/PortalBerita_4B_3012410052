@extends('master')

@section('title','Edit Berita')

@section('content')

<div class="container mt-5">

<h2>Edit Berita</h2>

<form action="{{ route('posts.update',$post->id) }}" method="POST">

@csrf
@method('PUT')

<div class="mb-3">

<label>Judul</label>

<input
type="text"
name="title"
class="form-control"
value="{{ $post->title }}">

</div>

<div class="mb-3">

<label>Isi Berita</label>

<textarea
name="content"
rows="6"
class="form-control">{{ $post->content }}</textarea>

</div>

<div class="mb-3">

<label>Nama Gambar</label>

<input
type="text"
name="image"
class="form-control"
value="{{ $post->image }}">

</div>

<div class="mb-3">

<label>Publisher</label>

<input
type="text"
name="publisher"
class="form-control"
value="{{ $post->publisher }}">

</div>

<div class="mb-3">

<label>Tanggal Berita</label>

<input
type="date"
name="tanggal_berita"
class="form-control"
value="{{ $post->tanggal_berita }}">

</div>

<div class="mb-3">

<label>Kategori</label>

<input
type="text"
name="kategori"
class="form-control"
value="{{ $post->kategori }}">

</div>

<div class="mb-3">

<label>Status Publish</label>

<select
name="published"
class="form-control">

<option
value="yes"
{{ $post->published=='yes' ? 'selected' : '' }}>
Yes
</option>

<option
value="no"
{{ $post->published=='no' ? 'selected' : '' }}>
No
</option>

</select>

</div>

<button class="btn btn-success">

Update

</button>

<a href="{{ route('posts.index') }}"
class="btn btn-secondary">

Kembali

</a>

</form>

</div>

@endsection