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
                            <li class="breadcrumb-item"><a href="{{ url('student/add') }}" class="btn btn-primary">Add New
                                Student</a></li>
                        </ol>
                    </div>
                </div>
            </div> 
        </section>


        <section class="content">
          <div class="container-fluid">

         
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
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Class</th>
                                                        <th>Gender</th>
                                                        <th>Caste</th>
                                                        <th>Religion</th>
                                                        <th>Height</th>
                                                        <th>Weight</th>
                                                        <th>Blood_group</th>

                                                        <th>Created At</th>
                                                        <th>Operations</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($getRecord as $userValue)
                                                        <tr>
                                                            <td>{{ $userValue->id }}</td>

                                                            <td>
                                                                @if(!empty($userValue->getProfile()))
                                                                 <img src="{{$userValue->getProfile()}}" 
                                                                style="height: :30px; width:30px; border-radius:20px;">
                                                                @endif
                                                            </td>
 
                                                            <td>{{ $userValue->name }}{{ $userValue->last_name }}</td>
                                                            <td>{{ $userValue->email }}</td>
                                                            <td>{{ $userValue->class_name }}</td>
                                                            <td>{{ $userValue->gender }}</td>
                                                            <td>{{ $userValue->caste }}</td>
                                                            <td>{{ $userValue->religion }}</td>
                                                            <td>{{ $userValue->height }}</td>
                                                            <td>{{ $userValue->weight }}</td>
                                                            <td>{{ $userValue->blood_grup }}</td>

                                                            <td>{{ date('d-m-Y',strtotime( $userValue->created_at)) }}</td>
                                                            <td>
                                                                <a href="{{ url('student/edit', $userValue->id) }}"
                                                                    class="btn btn-primary">Edit</a>
                                                                <a href="{{ url('student/delete', $userValue->id) }}"
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
