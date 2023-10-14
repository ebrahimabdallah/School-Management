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
                            <li class="breadcrumb-item"><a href="{{ url('admin/teacher/add') }}" class="btn btn-primary">Add New
                                    teacher</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>


        <section class="content">
            <div class="container-fluid">

                {{-- filter --}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">

                            <div class="card-header">
                                <h3 class="card-title">Search teachers</h3>
                            </div>
                            <!-- form start -->
                            <form action="" method="get">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-sm-3">
                                            <label for="name">teacher Name</label>
                                            <input type="text" name="name" class="form-control"
                                                placeholder="Name" value="{{ Request::get('name') }}">
                                        </div>

                                        <div class="form-group col-sm-3">
                                            <label>Qualification</label>
                                            <input type="text" name="Qualification" class="form-control"
                                                placeholder="Qualification" value="{{ Request::get('Qualification') }}">
                                        </div>

                                        <div class="form-group col-sm-3">
                                            <label>Martial Status</label>
                                            <input type="text" name=" martial_status" class="form-control" placeholder="Martial Status"
                                                value="{{ Request::get('martial_status ') }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <button class="btn btn-primary" style="margin-top: 30px;">Search</button>
                                            <a href="{{ url('admin/teacher/list') }}" class="btn btn-success"
                                                style="margin-top: 30px;">Clear</a>

                                        </div>
                                    </div>

                            </form>
                        </div>
                    </div>

                    {{-- end filter --}}


                    <div class="row">
                        <div class="col-md-12">

                            @include('message')
                            <div class="card">
                                <div class="card-header">

                                    <h1 class="card-title">Record Admin</h1>

                                    <div class="card-body p-0">
                                        <table class="table table-sm">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Profile</th>
                                                    
                                                    <th>teacher Name</th>
                                                     <th>Email</th>
                                                    <th>Date Of Birth</th>
                                                    <th>Date Of Joining</th>
                                                    <th>Mobile</th>
                                                    <th>Marital Status</th>
                                                    <th>Current Address</th>
                                                    <th>Qualification</th>
                                                    <th>Experience</th>
                                                     <th>Status</th>
                                                    <th>Created Date</th>
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
                                                       
                                                         <td>{{ $userValue->date_of_birth }}</td>
                                                        <td>{{ $userValue->admission_date }}</td>
                                                        <td>{{ $userValue->mobile_number }}</td>
                                                        <td>{{ $userValue->martial_status }}</td>
                                                        <td>{{ $userValue->address }}</td>

                                                         <td>{{ $userValue->Qualification }}</td>
                                                        <td>{{ $userValue->experience }}</td>
<td>
    {{($userValue->status==0)? 'Active' : 'InActive'}}
</td>
                                                        <td>{{ date('d-m-Y', strtotime($userValue->created_at)) }}</td>
                                                        <td>
                                                            <a href="{{ url('admin/teacher/edit', $userValue->id) }}"
                                                                class="btn btn-primary">Edit</a>
                                                            <a href="{{ url('admin/teacher/delete', $userValue->id) }}"
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
