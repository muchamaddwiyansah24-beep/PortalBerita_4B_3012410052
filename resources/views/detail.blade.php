<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $post->title }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f5f5f5;
        }

        .navbar{
            background:#d61f34;
        }

        .navbar-brand{
            color:white;
            font-weight:bold;
            font-size:30px;
        }

        .card{
            border:none;
            box-shadow:0 5px 20px rgba(0,0,0,.1);
        }

        img{
            border-radius:10px;
        }

        .popular a{
            text-decoration:none;
            color:black;
        }

        .popular a:hover{
            color:red;
        }
    </style>
</head>

<body>

<nav class="navbar mb-4">
    <div class="container">
        <a href="/" class="navbar-brand">
            Portal Berita
        </a>
    </div>
</nav>

<div class="container">

<div class="row">

<div class="col-lg-8">

<div class="card p-4">

<h2>{{ $post->title }}</h2>

<p class="text-muted">

{{ $post->publisher }}

|
{{ $post->tanggal_berita }}

</p>

<img src="{{ asset('images/'.$post->image) }}"
class="img-fluid mb-4">

<p style="text-align:justify; line-height:32px; font-size:18px;">

{{ $post->content }}

</p>

<a href="/"
class="btn btn-danger">

← Kembali

</a>

</div>

</div>

<div class="col-lg-4">

<div class="card">

<div class="card-header bg-dark text-white">

Berita Populer

</div>

<div class="list-group list-group-flush popular">

@foreach($popular as $item)

<a href="/berita/{{ $item->id }}"
class="list-group-item">

{{ $item->title }}

</a>

@endforeach

</div>

</div>

</div>

</div>

</div>

</body>
</html>