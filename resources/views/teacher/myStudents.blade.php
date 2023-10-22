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
                                                    <th>Parent Name</th>
                                                    <th>Email</th>
                                                    <th>Class</th>
                                                    <th>Gender</th>

                                                     <th>status</th>
                                                    <th>Religion</th>


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
                                                        <td>{{ $userValue->parent_name }}{{ $userValue->parent_last_name }}</td>

                                                        <td>{{ $userValue->email }}</td>
                                                        <td>{{ $userValue->class_name }}</td>
                                                        <td>{{ $userValue->gender }}</td>
                                                        </td>{{($userValue->status==0)? 'Active' : 'InActive'}}<td>

                                                        <td>{{ $userValue->religion }}</td>



                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </section>
    </div>
@endsection
