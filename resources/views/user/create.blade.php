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
                                <h3 class="card-title">DATA USER</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="/user/store" method="POST">
                                    @csrf
                                    <div class="form-group{{$errors->has('judul') ? 'has-error' : ''}}">
                                        <label for="exampleFormControlInput1">Nama User</label>
                                        <input type="text" name="name" class="form-control"
                                            id="exampleFormControlInput1" value="{{old('name')}}">
                                        @if($errors->has('name'))
                                        <span class="help-block">*{{$errors->first('name')}}</span>
                                        @endif
                                    </div>

                                    <div class="form-group{{$errors->has('email') ? 'has-error' : ''}}">
                                        <label for="exampleFormControlInput1">Email</label>
                                        <input type="email" name="email" class="form-control"
                                            id="exampleFormControlInput1" value="{{old('email')}}">
                                        @if($errors->has('email'))
                                        <span class="help-block">*{{$errors->first('email')}}</span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Role</label>
                                        <select name="role" class="form-control" id="exampleFormControlSelect1">
                                            <option value="" holder>Pilih Role</option>
                                            <option value="1" holder>Administrator</option>
                                            <option value="0" holder>Penulis</option>
                                        </select>
                                    </div>

                                    <div class="form-group{{$errors->has('password') ? 'has-error' : ''}}">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                                        @if($errors->has('password'))
                                        <span class="help-block">*{{$errors->first('password')}}</span>
                                        @endif
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
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
