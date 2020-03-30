<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datacategory = Category::paginate(5);
        return view('category.index', compact('datacategory'));
        
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

        $category = Category::create([
            'nama'  => $request->nama,
            'slug'  => Str::slug($request->nama)
        ]);

        return redirect('category')->with('status','Data Berhasil Ditambah');
        
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
        $category = Category::find($id);
        return view('category.edit', compact('category'));
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

        $category = Category::find($id);
        $category->update([
            'nama'  => $request->nama,
            'slug'  => Str::slug($request->nama)
        ]);

        return redirect('category')->with('status','Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::destroy($id);
        return redirect('category')->with('status', 'Data Berhasil Dihapus');
    }
}
