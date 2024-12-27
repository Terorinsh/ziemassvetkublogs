<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of active posts.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Fetch all posts where 'is_active' is true
        $posts = Post::where('is_active', true)->get();
        // Return the 'posts.index' view and pass the posts data to it
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new post.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Return the 'posts.create' view where a user can fill out the post form
        return view('posts.create');
    }

    /**
     * Store a newly created post in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|max:255', 
            'content' => 'required',
            'image' => 'nullable|image',
            'published_at' => 'required|date',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension(); 
            $imagePath = $image->storeAs('images', $filename, 'public'); 
        
            // Get the absolute path to the image file
            $absoluteImagePath = storage_path('app/public/' . $imagePath); 
        
            // Resize the image using ImageMagick
            $command = "convert {$absoluteImagePath} -resize 300x200 {$absoluteImagePath}"; 
            exec($command); 
        }

        // Create a new post record in the database
        $postojamais = [
            'title' => $request->title,             
            'content' => $request->content,         
            'image_path' => $imagePath,             
            'published_at' => $request->published_at, 
            'is_active' => $request->has('is_active'), 
        ];
        Post::create($postojamais);

        // Redirect the user to the posts index page
        return redirect()->route('admin.posts.index');
    }
 }
