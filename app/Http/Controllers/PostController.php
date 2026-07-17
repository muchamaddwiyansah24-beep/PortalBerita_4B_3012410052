<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // =========================
    // INDEX
    // =========================
    public function index()
    {
        $hero = Post::latest()->first();

        $posts = Post::latest()
                    ->skip(1)
                    ->take(6)
                    ->get();

        $popular = Post::latest()
                    ->take(5)
                    ->get();

        return view('index', compact(
            'hero',
            'posts',
            'popular'
        ));
    }

    // =========================
    // CREATE
    // =========================
    public function create()
    {
        return view('create');
    }

    // =========================
    // STORE
    // =========================
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'publisher' => 'required',
            'tanggal_berita' => 'required',
            'kategori' => 'required',
            'published' => 'required'
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $request->image,
            'publisher' => $request->publisher,
            'tanggal_berita' => $request->tanggal_berita,
            'kategori' => $request->kategori,
            'published' => $request->published
        ]);

        return redirect()->route('posts.index')
                ->with('success', 'Berita berhasil ditambahkan');
    }

    // =========================
    // READ
    // =========================
    public function show($id)
    {
        $post = Post::findOrFail($id);

        $popular = Post::latest()
            ->take(5)
            ->get();

        return view('detail', compact('post', 'popular'));
    }

    // =========================
    // EDIT
    // =========================
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('edit', compact('post'));
    }

    // =========================
    // UPDATE
    // =========================
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $request->image,
            'publisher' => $request->publisher,
            'tanggal_berita' => $request->tanggal_berita,
            'kategori' => $request->kategori,
            'published' => $request->published
        ]);

        return redirect()->route('posts.index')
                ->with('success', 'Berita berhasil diubah');
    }

    // =========================
    // DELETE
    // =========================
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $post->delete();

        return redirect()->route('posts.index')
                ->with('success', 'Berita berhasil dihapus');
    }
}