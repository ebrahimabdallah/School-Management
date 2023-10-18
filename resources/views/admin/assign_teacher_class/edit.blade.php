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
                                    <a href="{{ url('assign/teacher/list') }}" class="btn btn-primary">Edit Teacher Classes</a>
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
                                        <h3 class="card-title"> New Assign Classes</h3>
                                    </div>
                                    <!-- form start -->
                                    <form action="" method="post">
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Class Name</label>
                                                <select class="form-control" name="class_id" required>
                                                    <option value="">Select Class</option>

                                                    @foreach ($getClass as $class)
                                                        <option {{ ($getRecord->class_id == $class->id) ? 'selected' : '' }} value="{{ $class->id }}">{{ $class->name }}</option>
                                                    @endforeach
                                                
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="class_id">Teacher Name</label>
                                                @foreach ($getTeacher as $teacher)
                                                    <div>
                                                        <label style="font-weight: normal">
                                                            <input {{ ($getRecord->teacher_id==$teacher->id) ? 'checked' : '' }} type="checkbox" value="{{ $teacher->id }}" name="teacher_id[]"> {{ $teacher->name }} 
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>

                                            <div class="form-group">
                                                <label for="name">Status</label>
                                                <select class="form-control" name="status" id="status">
                                                    <option value="0">Active</option>
                                                    <option value="1">Inactive</option>
                                                </select>
                                            </div>
                                             
                                        </div>

                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Add</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> 
                </section>
            </div>
        </div>
    </body>
</html>
@endsection