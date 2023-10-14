@extends('layouts.app')

@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">


                <div class="row mb-2">

                    <div class="col-sm-6">
                    </div>


                </div>
            </div>
        </section>


        <section class="content">
            <div class="container-fluid">

                {{-- filter --}}
                <div class="row">
                    <h1>Parent ({{ $getParent->name }}
                        {{ $getParent->last_name }})</h1>
                    <div class="col-md-12">
                      
                        <div class="card card-primary">

                            <div class="card-header">
                                <h3 class="card-title">Search Parent</h3>
                            </div>
                            <!-- form start -->
                            <form action="" method="get">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-sm-3">
                                            <label for="name">Parent Name</label>
                                            <input type="text" name="name" class="form-control" placeholder="Name"
                                                value="{{ Request::get('name') }}">
                                        </div>

                                        <div class="form-group col-sm-3">
                                            <label for="last_name">last Name</label>
                                            <input type="text" name="last_name" class="form-control"
                                                placeholder="Last Name" value="{{ Request::get('last_name') }}">
                                        </div>

                                        <div class="form-group col-sm-3">
                                            <label for="id">Student Id</label>
                                            <input type="text" name="id" class="form-control"
                                                placeholder="Student Id" value="{{ Request::get('id') }}">
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label for="email">Student Id</label>
                                            <input type="text" name="email" class="form-control" placeholder="Email "
                                                value="{{ Request::get('email') }}">
                                        </div>



                                        <div class="form-group col-md-3">
                                            <button class="btn btn-primary" style="margin-top: 30px;">Search</button>
                                            <a href="{{ url('admin/parent/mystudent/' . $parent_id) }}"
                                                class="btn btn-success" style="margin-top: 30px;">Clear</a>

                                        </div>
                                    </div>

                            </form>
                        </div>
                    </div>

                    {{-- end filter --}}


                    <div class="row">
                        <div class="col-md-12">

                            @include('message')


                            @if (!empty($getSearchStudent))
                                <div class="card">
                                    <div class="card-header">
                                        <h1 class="card-title">Student List </h1>

                                        <div class="card-body p-0">
                                            <table class="table table-sm">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Profile</th>

                                                        <th>Name</th>
                                                        <th>Email</th>



                                                        <th>Created Date</th>
                                                        <th>Parent Name</th>

                                                        <th>Operations</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($getSearchStudent as $userValue)
                                                        <tr>
                                                            <td>{{ $userValue->id }}</td>

                                                            <td>
                                                                @if (!empty($userValue->getProfile()))
                                                                    <img src="{{ $userValue->getProfile() }}"
                                                                        style="height: :30px; width:30px; border-radius:20px;">
                                                                @endif
                                                            </td>

                                                            <td>{{ $userValue->name }}{{ $userValue->last_name }}</td>
                                                            <td>{{ $userValue->email }}</td>
                                                            <td>{{ $userValue->created_at }}</td>
                                                            <td>{{ $userValue->parent_name }}</td>



                                                            <td>
                                                                {{-- <a href="{{ url('student/edit', $userValue->id) }}"
                                                            class="btn btn-primary">Edit</a> --}}
                                                                <a href="{{ url('admin/parent/assign_student', $userValue->id . '/' . $parent_id) }}"
                                                                    class="btn btn-primary">Add To Parent</a>

                                                                {{-- <a href="{{ url('student/delete', $userValue->id) }}"
                                                            class="btn btn-danger">Delete</a> --}}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </thead>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div style="padding: 10px; text-align: right">
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="card">
                                <div class="card-header">

                                    <h1 class="card-title">Parent Student  </h1>

                                    <div class="card-body p-0">
                                        <table class="table table-sm">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Profile</th>

                                                    <th>Name</th>
                                                    <th>Email</th>



                                                    <th>Created Date</th>
                                                    <th>Parent Name</th>

                                                    <th>Operations</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($getRecord as $userValue)
                                                    <tr>
                                                        <td>{{ $userValue->id }}</td>

                                                        <td>
                                                            @if (!empty($userValue->getProfile()))
                                                                <img src="{{ $userValue->getProfile() }}"
                                                                    style="height: :30px; width:30px; border-radius:20px;">
                                                            @endif
                                                        </td>

                                                        <td>{{ $userValue->name }}{{ $userValue->last_name }}</td>
                                                        <td>{{ $userValue->email }}</td>
                                                        <td>{{ $userValue->created_at }}</td>
                                                        <td>{{ $userValue->parent_name }}</td>



                                                        <td>
                                                            {{-- <a href="{{ url('student/edit', $userValue->id) }}"
                                                            class="btn btn-primary">Edit</a> --}}
                                                            <a href="{{ url('admin/parent/assign_student_delete', $userValue->id) }}"
                                                                class="btn btn-primary">Delete</a>

                                                            {{-- <a href="{{ url('student/delete', $userValue->id) }}"
                                                            class="btn btn-danger">Delete</a> --}}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div style="padding: 10px; text-align: right">




                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </section>
    </div>
@endsection
