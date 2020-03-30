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
                                <h3 class="card-title">DATA KERANJANG HAPUS POST</h3>
                            </div>
                            <!-- /.card-header -->  
                            <div class="card-body">
                                
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example2" class="table table-bordered table-hover dataTable"
                                            role="grid" aria-describedby="example2_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_desc" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Rendering engine: activate to sort column ascending"
                                                        aria-sort="descending">No</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        Judul</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        Kategori</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        Tag</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        Gambar</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Engine version: activate to sort column ascending">
                                                        Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($dataPost as $post=>$hasil)
                                                <tr>
                                                    <td>{{$post + $dataPost->firstitem()}}</td>
                                                    <td>{{$hasil->judul}}</td>
                                                    <td>{{$hasil->category->nama}}</td>
                                                    <td>
                                                        @foreach ($hasil->tag as $tag)
                                                                <h6><span class="badge badge-info">{{$tag->nama}}</span></h6>
                                                        @endforeach
                                                    </td>

                                                    <td><img src="{{asset('images/'.$hasil->gambar)}}" class="img-fluid" style="width:100px"></td>

                                                    <td>
                                                        <a href="/post/{{$hasil->id}}/restore"
                                                            class="btn btn-info">Restore</a>
                                                        <a href="/post/{{$hasil->id}}/kill"
                                                            class="btn btn-danger"
                                                            onclick="return confirm ('Yakin Mau Dihapus ?')">Delete</a>
                                                    </td>

                                                </tr>
                                                @endforeach


                                            </tbody>
                                        </table>


                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                        <div class="dataTables_info" id="example2_info" role="status"
                                            aria-live="polite">
                                            Showing 1 to 5 of 57 entries</div>
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        {{$dataPost->links()}}
                                    </div>
                                </div>
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
</div><!-- /.container-fluid -->
</section>







@endsection
