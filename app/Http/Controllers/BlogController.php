<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\User;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('blog.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'title' => ['required', 'string', 'max:255','min:3'],
            'description' => ['required', 'string', 'max:255','min:3'],
            'creator' => ['required'],
        ]);

       Blog::create([
           'title'=>request('title'),
           'description'=>request('description'),
           'user_id'=>request('creator'),
       ]);
        return to_route('blog.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('blog.show' , compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $users = User::all();
        return view('blog.edit', compact('users','blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        request()->validate([
            'title' => ['required', 'string', 'max:255','min:3'],
            'description' => ['required', 'string', 'max:255','min:3'],
            'creator' => ['required'],
        ]);
        $blog->update([
            'title'=>request('title'),
            'description'=>request('description'),
            'user_id'=>request('creator'),
        ]);
        return to_route('blog.show', $blog);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return to_route('blog.index');
    }
}
