@include('frontend.include.header')

@extends('frontend.include.isi_konten')

@section('content')


    @foreach ($data as $list_artikel)
        
    
    <div class="post post-row">

        <a class="post-img" href="{{route('blog.isi', $list_artikel->slug)}}"><img src="{{asset('images/'.$list_artikel->gambar)}}" alt=""></a>
        <div class="post-body">
            <div class="post-category">
                <a href="category.html">{{$list_artikel->category->nama}}</a>
            </div>
            <h3 class="post-title"><a href="blog-post.html">{{$list_artikel->judul}}</a></h3>
            <ul class="post-meta">
                <li><a href="author.html">{{$list_artikel->users->name}}</a></li>
                <li>{{$list_artikel->created_at}}</li>
            </ul>
        <p></p>

        </div>
        
    </div>

    @endforeach

{{$data->links()}}

@endsection
