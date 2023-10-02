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
                            <li class="breadcrumb-item"><a href="{{ url('admin/assign_subject/add') }}"
                                    class="btn btn-primary">New
                                    AssignSubject</a></li>
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
                                            <input type="text" name="class_name" class="form-control"
                                                placeholder="class name" value="{{ Request::get('class.name') }}">
                                        </div>

                                        <div class="form-group col-sm-3">
                                            <label for="name">Subject Name</label>
                                            <input type="text" name="subject_name" class="form-control"
                                                placeholder="subject name" value="{{ Request::get('subject_name') }}">
                                        </div>




                                        <div class="form-group col-md-3">
                                            <button class="btn btn-primary" style="margin-top: 30px;">Search</button>
                                            <a href="{{ url('assign/list') }}" class="btn btn-success"
                                                style="margin-top: 30px;">Clear</a>

                                        </div>
                                    </div>

                            </form>
                        </div>
                    </div>

                    {{-- end filter --}}

                    <!-- Main content -->


                    @include('message')
                    <div class="card">
                        <div class="card-header">

                            <h1 class="card-title">Record Class</h1>

                            <div class="card-body p-0">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Class Name</th>
                                            <th>Subject Name</th>

                                            <th>Status</th>
                                            <th>Create By</th>
                                            <th>Create Date</th>
                                            <th>Operations</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($getRecord as $valueClass)
                                            <tr>
                                                <td>{{ $valueClass->id }} </td>
                                                <td>{{ $valueClass->class_name }} </td>
                                                <td>{{ $valueClass->subject_name }} </td>

                                                <td>
                                                    @if ($valueClass->status == 0)
                                                        Active
                                                    @else
                                                        In active
                                                    @endif
                                                </td>


                                                <td>{{ $valueClass->created_by_name }} </td>
                                                <td>{{ date('d-m-Y H:i A', strtotime($valueClass->created_at)) }} </td>

                                                <td>

                                                    <a href="{{ url('admin/assign_subject/edit', $valueClass->id) }}"
                                                        class="btn btn-primary">Edit</a>
                                                    <a href="{{ url('admin/assign_subject/delete', $valueClass->id) }} "
                                                        class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{-- paginate --}}
                                <div style="padding: 10px; text-align: right">
                                    <div class="pagination-container">
                                        <ul class="pagination">
                                            @for ($i = 1; $i <= $getRecord->lastPage(); $i++)
                                                @if ($i == $getRecord->currentPage())
                                                    <li class="page-item active"><span class="page-link">
                                                            {{ $i }} </span></li>
                                                @else
                                                    <li class="page-item"><a
                                                            href="{{ $getRecord->appends(['search' => request()->query('search')])->url($i) }}"
                                                            class="page-link">{{ $i }}</a></li>
                                                @endif
                                            @endfor
                                        </ul>
                                    </div>
                                </div>
                                {{-- End paginate --}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
