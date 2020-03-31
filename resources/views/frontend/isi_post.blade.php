@include('frontend.include.header')
<div id="post-header" class="page-header">
    @foreach ($data as $isi_post)
    <div class="page-header-bg"
        style="background-image: url(&quot;{{asset('images/'.$isi_post->gambar)}}&quot;); background-position: 0px -21px;"
        data-stellar-background-ratio="0.5"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="post-category">
                    <a href="category.html">{{$isi_post->category->nama}}</a>
                </div>
                <h1>{{$isi_post->judul}}</h1>
                <ul class="post-meta">
                    <li><a href="author.html">{{$isi_post->users->name}}</a></li>
                    <li>{{$isi_post->created_at}}</li>
                </ul>
            </div>
        </div>
    </div>
    @endforeach
</div>
@extends('frontend.include.isi_konten')


@section('content')

    @foreach ($data as $isi_post)
        {{-- <img src="{{asset('images/'.$isi_post->gambar)}}" alt=""> --}}
        {{$isi_post->konten}}
    @endforeach
@endsection
