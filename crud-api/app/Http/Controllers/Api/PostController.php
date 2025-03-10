<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // create post

    public function addPost(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $post = Post::create([
            'title' => $request->title,
            'body' => $request->body
        ]);

        return response()->json($post,201);
    }

    // get all posts

    public function getPosts()
    {
        $posts = Post::all();
        return response()->json($posts);
    }

    // get single post

    public function getPost($id)
    {
        $post = Post::find($id);

        if(!$post) {
            return response()->json(['message' => 'Post not found'],404);
        }
        return response()->json($post);
    }

    // edit post

    public function editPost(Request $request, $id)
    {
        $post = Post::find($id);

        if(!$post) {
            return response()->json(['message' => 'Post not found'],404);
        }

        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        return response()->json($post);
    }

    // delete post

    public function deletePost($id)
    {
        $post = Post::find($id);    

        if(!$post) {
            return response()->json(['message' => 'Post not found'],404);
        }   

        $post->delete();

        return response()->json(['message' => 'Post deleted successfully']);
    }
}