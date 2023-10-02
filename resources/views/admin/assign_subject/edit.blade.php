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
                                <a href="{{ url('assign/list') }}" class="btn btn-primary">Subjects</a>
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
                                    <h3 class="card-title">Edit Assign Subject</h3>
                                </div>
                                <!-- form start -->
                                <form action="" method="post">
                                    {{ csrf_field() }}
                                    <div class="card-body">


                                        <div class="form-group">
                                            <label>Class Name</label>
                                            <select class="form-control" name="class_id" required>
                                                <option value="">Select Class</option>

                                                @foreach ($getClass as $class)
                                                    <option {{ ($getRecord->class_id==$class->id) ? 'selected' : '' }}
                                                        value="{{ $class->id }}">{{ $class->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>



                                        <div class="form-group">
                                            <label for="class_id">Subject Name</label>
                                            @foreach ($getSubject as $subject)
                                            
<?php 
$checked = "";
?>
                                                @foreach ($getAssignSubjectID as $subjectAssign)
                                                    @if ($subjectAssign->subject_id==$subject->id)
                                                        <?php
                                                            $checked="checked";
                                                        ?>
                                                    @endif
                                                @endforeach

                                                <div>
                                                    <label style="font-weight: normal">
                                                        <input {{ $checked }} type="checkbox"
                                                            value="{{ $subject->id }}" name="subject_id[]">
                                                        {{ $subject->name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>

                                        <div class="form-group">
                                            <label for="name">Status</label>
                                            <select class="form-control" name="status" id="status">
                                                <option {{ ($getRecord->status==$class->id) ? 'selected' : '' }}
                                                    value="0">Active</option>
                                                <option {{ ($getRecord->status==$class->id) ? 'selected' : '' }}
                                                    value="1">In active</option>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">update</button>
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