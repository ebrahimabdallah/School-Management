@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{ url('assign_teacher_class') }}" class="btn btn-primary">New Assign Teacher</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                {{-- filter --}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Search Class</h3>
                            </div>
                            <!-- form start -->
                            <form action="" method="get">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-sm-3">
                                            <label for="name">Class Name</label>
                                            <input type="text" name="class_name" class="form-control" placeholder="class name" value="{{ Request::get('class_name') }}">
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label for="name">Subject Name</label>
                                            <input type="text" name="subject_name" class="form-control" placeholder="subject name" value="{{ Request::get('subject_name') }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <button class="btn btn-primary" style="margin-top: 30px;">Search</button>
                                            <a href="{{ url('assign/list') }}" class="btn btn-success" style="margin-top: 30px;">Clear</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- end filter --}}

                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">Record Class</h1>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Class Name</th>
                                    <th>Subject Name</th>
                                    <th>Status</th>
                                    <th>Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($getRecord as $valueClass)
                                    <tr>
                                        <td>{{ $valueClass->id }}</td>
                                        <td>{{ $valueClass->class_name }}</td>
                                        <td>{{ $valueClass->teacher_name }}</td>
                                        <td>
                                            @if ($valueClass->status == 0)
                                                Active
                                            @else
                                                Inactive
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('admin/assign_teacher_class/edit', $valueClass->id) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ url('admin/assign_teacher_class/delete', $valueClass->id) }}" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection