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
                                <h3 class="card-title">DATA KATEGORI</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="col-sm-12 col-md-6">
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#exampleModal">Tambah Data</button>
                                    </div>
                                </div>
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
                                                        Nama Kategori</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        Slug</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Engine version: activate to sort column ascending">
                                                        Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($datacategory as $category=>$hasil)
                                                <tr>
                                                    <td>{{$category + $datacategory->firstitem() }}</td>
                                                    <td>{{$hasil->nama}}</td>
                                                    <td>{{$hasil->slug}}</td>
                                                    <td>
                                                        <a href="/category/{{$hasil->id}}/edit" class="btn btn-warning">Edit</a>
                                                        <a href="/category/{{$hasil->id}}/destroy" class="btn btn-danger" onclick="return confirm ('Yakin Mau Dihapus ?')">Delete</a>
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
                                        {{$datacategory->links()}}
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



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">DATA KATEGORI</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="category/create" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama Kategori</label>
                        <input type="text" name="nama" class="form-control" id="exampleFormControlInput1"
                            value="{{old('nama')}}">
                    </div>
                    @if(count($errors)>0)
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{$error}}
                    </div>
                    @endforeach
                    @endif

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>



@endsection
