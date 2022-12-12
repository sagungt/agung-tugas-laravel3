<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller {
    public function index() {
        $posts = Post::query()->get();
        return view('posts.list', ['posts' => $posts]);
    }

    public function store()
    {
        return view('posts.store', ['type' => 'create']);
    }

    public function create(Request $request)
    {
        $payload = [
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ];
        $poster = $request->file('poster');
        $poster->storeAs('images', $poster->hashName());
        $path = $request->getSchemeAndHttpHost() . '/storage/images/' . $poster->hashName();
        $payload['poster'] = $path;
        $content = $payload['content'];
        $payload['summary'] = (strlen($content) > 250) ? substr($content, 0, 250) . '...' : $content;
        $payload['slug'] = Str::slug($payload['title']) . Str::random(10);
        Post::create($payload);
        return redirect()->back()->with(['message' => 'Post created']);
    }

    public function detail($slug)
    {
        $post = Post::query()->where('slug', $slug)->first();
        $post['view_count'] += 1;
        $post->save();
        return view('posts.detail', ['post' => $post]);
    }
    
    public function edit($slug)
    {
        $post = Post::query()->where('slug', $slug)->first();
        return view('posts.store', ['type' => 'edit', 'post' => $post]);
    }

    public function update(Request $request, $slug)
    {
        $post = Post::query()
            ->where('slug', $slug)
            ->first();

        $input = $request->all();
        if ($request->hasFile('poster')) {
            $poster = $request->file('poster');
            $poster->storeAs('images', $poster->hashName());
            $newPath = $request->getSchemeAndHttpHost() . '/storage/images/' . $poster->hashName();
            $input['poster'] = $newPath;
            $file = str_replace($request->getSchemeAndHttpHost() . '/storage', '', $post->poster);
            Storage::delete($file);
        }
        if ($request->input('content')) {
            $input['summary'] = (strlen($input['content']) > 250) ? substr($input['content'], 0, 250) . '...' : $input['content'];
        }
        $filtered = array_intersect_key($input, array_flip(['title', 'poster', 'content', 'summary', 'is_published']));
        
        $post->fill($filtered);
        $post->save();

        return redirect()->back()->with(['message' => 'Post updated']);
    }

    public function destroy($slug)
    {
        Post::query()->where('slug', $slug)->delete();
        return redirect()->route('post.list')->with(['message' => 'Post deleted']);
    }
}
