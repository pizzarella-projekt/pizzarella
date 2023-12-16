<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Aktualnosci', ['posts' => Post::all()]);
    }

    public function create()
    {
        return Inertia::render('Admin/Aktualnosci/Create');
    }

    public function edit(int $id)
    {
        $post = Post::find($id);
        return Inertia::render('Admin/Aktualnosci/Edit', ['post' => $post]);
    }

    public function store(Request $request)
    {
        $post = Post::create($request->validate([
            'title' => ['required', 'max:500'],
            'body' => ['required', 'max:1000'],
        ]));

        $file = $request->file('image');
        if ($file) {
            $file->move('storage/posts', $post->id . '.png');
        }

        return to_route('aktualnosci.index');
    }

    public function update(Request $request, int $id)
    {
        $data = $request->validate([
            'title' => ['required', 'max:500'],
            'body' => ['required', 'max:1000'],
        ]);

        $post = Post::find($id);
        $post->update($data);

        $file = $request->file('image');
        if ($file) {
            $file->move('storage/posts', $post->id . '.png');
        }

        return to_route('aktualnosci.index');
    }

    public function destroy(int $id)
    {
        Post::destroy($id);
        return to_route('aktualnosci.index');
    }
}
