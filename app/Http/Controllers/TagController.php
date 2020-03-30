<?php

namespace App\Http\Controllers;
use App\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataTag = Tag::paginate(5);
        return view('tag.index', compact('dataTag'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validate = $request->validate ([
            'nama'  =>'required|min:5'
        ]);

        $tag = Tag::create([
            'nama'  => $request->nama,
            'slug'  => Str::slug($request->nama)
        ]);

        return redirect('tag')->with('status','Data Berhasil Ditambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $tag = Tag::find($id);
        return view('tag.edit', compact('tag'));
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
        $validate = $request->validate ([
            'nama'  =>'required|min:5'
        ]);

        $tag = Tag::find($id);
        $tag->update([
            'nama'  => $request->nama,
            'slug'  => Str::slug($request->nama)
        ]);

        return redirect('tag')->with('status','Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::destroy($id);
        return redirect('tag')->with('status','Data Berhasil Dihapus');
    }
}
