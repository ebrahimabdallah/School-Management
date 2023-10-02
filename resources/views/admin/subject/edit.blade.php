@extends('layouts.app')

@section('content')
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
                                <li class="breadcrumb-item"><a href="{{ url('subject/list') }}">Class</a></li>
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
                                    <h3 class="card-title">Edit New Subject</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="" method="post">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" value="{{ $getRecord->name }}" class="form-control" id="name"
                                                placeholder="Your name">
                                        </div>

                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="form-control" name="status">
                                                <option value="0" {{ ($getRecord->status == 0) ? 'selected' : '' }}>Active</option>
                                                <option value="1" {{ ($getRecord->status == 1) ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="type">type</label>
                                            <select class="form-control" name="type">
                                                <option value="theory" {{ ($getRecord->type == "theory") ? 'selected' : '' }}>theory</option>
                                                <option value="practical" {{ ($getRecord->type == "practical") ? 'selected' : '' }}>practical</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Edit</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
@endsection