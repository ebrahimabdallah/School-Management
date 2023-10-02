@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <!-- Navbar -->

            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">

                            </div>
                            <div class="col-sm-12">
                                <ol class="breadcrumb float-sm-right">
                                    <a href="{{ url('admin/admin/list') }}" class="btn btn-primary">Admins</a>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <!-- left column -->
                            <div class="col-md-12">
                                <!-- general form elements -->
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Edit Admin</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form  action="" method="post">
                                        {{csrf_field()}}
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" name="name" value="{{old('email',$getRecord->name)}}"  class="form-control" id="name"
                                                    placeholder="Your name">
                                            </div>

                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" value="{{old('email',$getRecord->email)}}" id="email" name="email"
                                                    placeholder="Enter email">
                                            </div>
                                            <div style="color: red">{{$errors->first('email')}}</div>

                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="text" name="password" value="{{$getRecord->password}}" class="form-control" id="password"
                                                    placeholder="Password">
                                                    <p>Do Youu Want Change Password Please Add New Password </p>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card -->


                                <!-- /.card -->

                            </div>

                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
        @endsection
