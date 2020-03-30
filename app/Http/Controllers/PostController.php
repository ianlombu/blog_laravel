<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataPost = Post::paginate(5);
        return view('post.index', compact('dataPost'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        $category = Category::all();
        $tag = Tag::all();
        return view('post.create', compact('category','tag'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'judul'         => 'required',
            'category_id'   => 'required',
            'konten'        => 'required',
            'gambar'        => 'required|mimes:jpeg,png',  
        ]);
        
        $gambar = $request->gambar;
        $new_gambar = time().$gambar->getClientOriginalName();

        $post = Post::create([
            'judul'         => $request->judul,
            'category_id'   => $request->category_id,
            'konten'        => $request->konten,
            'gambar'        => $new_gambar,
            'slug'          => Str::slug($request->judul),
            'users_id'      => Auth::id()
        ]);
        
        $post->tag()->attach($request->tag);
        $gambar->move('images/', $new_gambar);
        return redirect('post')->with('status','Postingan Anda Berhasil Disimpan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $category = Category::all();
        $tag = Tag::all();
        return view('post.edit', compact('category','tag','post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'judul'         => 'required',
            'category_id'   => 'required',
            'konten'        => 'required',
        ]);
        
        $post = Post::find($id);
        if($request->has('gambar')) {
            $gambar = $request->gambar;
            $new_gambar = time().$gambar->getClientOriginalName();
            $gambar->move('images/', $new_gambar);

            $post_data = [
                'judul'         => $request->judul,
                'category_id'   => $request->category_id,
                'konten'        => $request->konten,
                'gambar'        => $new_gambar,
                'slug'          => Str::slug($request->judul)
            ];
        }

        else {
            $post_data = [
                'judul'         => $request->judul,
                'category_id'   => $request->category_id,
                'konten'        => $request->konten,
                'slug'          => Str::slug($request->judul)
            ];
        }
        
        $post->tag()->sync($request->tag);
        $post->update($post_data);
        
        return redirect('post')->with('status','Postingan Anda Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect('post')->with('status','Post Anda Berhasil Dihapus');
    }

    public function trash()
    {       
        $dataPost = Post::onlyTrashed()->paginate(5);
        return view('post.trash', compact('dataPost'));
    }

    public function restore($id)
    {
        $dataPost = Post::withTrashed()->where('id', $id)->restore();
        return redirect('/post/trash')->with('status','Post Berhasil Direstore');
    }

    public function kill($id)
    {
        $dataPost = Post::withTrashed()->where('id', $id)->forceDelete();
        return redirect('/post/trash')->with('status','Post Berhasil Dihapus');
    }
}
