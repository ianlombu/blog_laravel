@extends('backendmaster.master')


@section('content')

<div class="content-wrapper" style="min-height: 1200.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">

            <!-- Main content -->
            <section class="content">
                @if(session('status'))
                <div class="alert alert-success" role="alert">
                    {{session('status')}}
                </div>
                @endif
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">DATA POST</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="/post/{{$post->id}}/update" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group{{$errors->has('judul') ? 'has-error' : ''}}">
                                        <label for="exampleFormControlInput1">Judul</label>
                                        <input type="text" name="judul" class="form-control"
                                            id="exampleFormControlInput1" value="{{$post->judul}}">
                                        @if($errors->has('judul'))
                                        <span class="help-block">*{{$errors->first('judul')}}</span>
                                        @endif
                                    </div>

                                    <div class="form-group{{$errors->has('category_id') ? 'has-error' : ''}}">
                                        <label for="exampleFormControlSelect1">Kategori</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                                            <option value="" holder>Pilih Kategori</option>
                                            @foreach ($category as $item)
                                            <option value="{{$item->id}}" 
                                                @if($item->id == $post->category_id)
                                                    selected
                                                @endif
                                                    >{{$item->nama}}</option>
                                                @endforeach
                                            @if($errors->has('category_id'))
                                            <span class="help-block">*{{$errors->first('category_id')}}</span>
                                            @endif
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Pilih Tag</label>
                                        <select class="select2" multiple="multiple" data-placeholder="Select a State"
                                            name="tag[]" style="width: 100%;">
                                            @foreach ($tag as $tag)
                                            <option value="{{$tag->id}}" 
                                                @foreach ($post->tag as $value)
                                                @if($tag->id == $value->id)
                                                selected
                                                @endif
                                                @endforeach
                                                >{{$tag->nama}}</option>
                                            @endforeach

                                        </select>
                                    </div>

                                    <div class="form-group{{$errors->has('konten') ? 'has-error' : ''}}">
                                        <label for=" exampleFormControlTextarea1">Konten</label>
                                        <textarea class="form-control" id="editor1" rows="3"
                                            name="konten">{{$post->konten}}</textarea>
                                        @if($errors->has('konten'))
                                        <span class="help-block">*{{$errors->first('konten')}}</span>
                                        @endif
                                    </div>
                                    <div class="form-group{{$errors->has('gambar') ? 'has-error' : ''}}">
                                        <label for="exampleFormControlFile1">Thumbnail</label>
                                        <input type="file" name="gambar" class="form-control-file"
                                            id="exampleFormControlFile1">
                                        @if($errors->has('gambar'))
                                        <span class="help-block">*{{$errors->first('gambar')}}</span>
                                        @endif
                                    </div>


                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
            </section>
            <!-- /.col -->
        </div>
        <!-- /.row -->

</div>

<script>
    CKEDITOR.replace( 'editor1' );
</script>

@endsection
