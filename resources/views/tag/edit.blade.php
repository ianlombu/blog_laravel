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
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">DATA TAG</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="/tag/{{$tag->id}}/update" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Nama Tag</label>
                                        <input type="text" name="nama" class="form-control"
                                            id="exampleFormControlInput1" value="{{$tag->nama}}">
                                    </div>
                                    @if(count($errors)>0)
                                    @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger" role="alert">
                                        {{$error}}
                                    </div>
                                    @endforeach
                                    @endif


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










@endsection
