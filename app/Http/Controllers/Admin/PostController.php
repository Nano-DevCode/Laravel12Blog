<?php

namespace App\Http\Controllers\Admin;

use App\Events\UploadedImage;
use App\Http\Controllers\Controller;
use App\Jobs\ResizeImage;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest('id')->paginate();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:posts,slug',
            'category_id' => 'required|string|max:255|exists:categories,id',
        ]);
        $data['user_id'] = auth()->id();

        $post = Post::create($data);

        session()->flash('swal',[
            'icon' => 'success',
            'title' => 'Post creado',
            'text' => 'El posts se ha creado correctamente'
        ]);

        return redirect()->route('admin.posts.edit', $post);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('admin.posts.show' , compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {

        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.edit', compact('post', 'categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => [
                Rule::requiredIf(function() use ($post){
                    return !$post->published_at;
                }),
                'string',
                'max:255',
                Rule::unique('posts')->ignore($post->id)
            ],
            'image' => 'nullable|image|max:12048',
            'category_id' => 'required|integer|exists:categories,id',
            'excerpt' => 'required_if:is_published,1|string',
            'content' => 'required_if:is_published,1|string',
            'tags' => 'array',
            'is_published' => 'required|boolean'
        ]);

        if($request->hasFile('image')){
            if($post->image_path){
                Storage::delete($post->image_path);
            }

            $data['image_path'] = Storage::put('posts',$request->image);

            /*
            Si quieres usarlo desde aqui
            $upload = $request->file('image');
            $image = Image::read($upload)
            ->scale(width:1200);

            $path = 'posts/' . Str::random() . '.' . $upload->getClientOriginalExtension();

            Storage::put(
                $path,
                $image->encodeByExtension($upload->getClientOriginalExtension(), quality: 70)
            );

            $data['image_path'] = $path;
            */

            /*
            Si quieres usarlo con jobs
            ResizeImage::dispatch($data['image_path']);
            */

            UploadedImage::dispatch($data['image_path']);
        }

        $post->update($data);

        $tags = [];

        foreach ($request->tags ?? [] as $tag){
            $tags[]= Tag::firstOrCreate(['name' => $tag]);
        }

        $post->tags()->sync($tags);

        session()->flash('swal',[
            'icon' => 'success',
            'title' => 'Post actualizado',
            'text' => 'El posts se ha actualizado correctamente'
        ]);

        return redirect()->route('admin.posts.edit', $post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
