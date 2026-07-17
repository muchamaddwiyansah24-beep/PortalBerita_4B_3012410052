@extends('master')

@section('title','Portal Berita')

@section('content')

<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">

        <a class="navbar-brand fw-bold">
            Portal Berita
        </a>

    </div>
</nav>

<div class="container mt-4">

    {{-- Button CREATE --}}
    <div class="mb-4">
        <a href="{{ route('posts.create') }}" class="btn btn-success">
            + Tambah Berita
        </a>
    </div>

    <div class="row">

        <div class="col-md-8">

            <div class="card shadow">

                <img src="{{ asset('images/'.$hero->image) }}"
                    height="420"
                    style="object-fit:cover;">

                <div class="card-body">

                    <span class="badge bg-danger">
                        {{ $hero->kategori }}
                    </span>

                    <h2 class="mt-3">
                        {{ $hero->title }}
                    </h2>

                    <p>
                        {{ Str::limit($hero->content,250) }}
                    </p>

                    <a href="{{ route('posts.show',$hero->id) }}"
                        class="btn btn-danger">

                        Baca Selengkapnya

                    </a>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card shadow">

                <div class="card-header bg-dark text-white">

                    Berita Populer

                </div>

                <div class="list-group list-group-flush">

                    @foreach($popular as $item)

                        <a href="{{ route('posts.show',$item->id) }}"
                            class="list-group-item">

                            {{ $item->title }}

                        </a>

                    @endforeach

                </div>

            </div>

        </div>

    </div>

    <hr>

    <div class="row">

        @foreach($posts as $post)

        <div class="col-md-4">

            <div class="card mb-4 shadow">

                <img src="{{ asset('images/'.$post->image) }}"
                    height="220"
                    style="object-fit:cover;">

                <div class="card-body">

                    <span class="badge bg-primary">

                        {{ $post->kategori }}

                    </span>

                    <h5 class="mt-2">

                        {{ $post->title }}

                    </h5>

                    <small>

                        {{ $post->publisher }}

                        <br>

                        {{ $post->tanggal_berita }}

                    </small>

                    <p class="mt-3">

                        {{ Str::limit($post->content,100) }}

                    </p>

                    {{-- READ --}}
                    <a href="{{ route('posts.show',$post->id) }}"
                        class="btn btn-primary btn-sm">

                        Baca Selengkapnya

                    </a>

                    {{-- UPDATE --}}
                    <a href="{{ route('posts.edit',$post->id) }}"
                        class="btn btn-warning btn-sm">

                        Edit

                    </a>

                    {{-- DELETE --}}
                    <form action="{{ route('posts.destroy',$post->id) }}"
                        method="POST"
                        class="d-inline">

                        @csrf
                        @method('DELETE')

                        <button
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Yakin ingin menghapus berita ini?')">

                            Hapus

                        </button>

                    </form>

                </div>

            </div>

        </div>

        @endforeach

    </div>

</div>

@endsection