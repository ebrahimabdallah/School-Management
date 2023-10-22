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

                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">


                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">My Subject Class</h1>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Class Name</th>
                                    <th>Subject Name</th>
                                    <th>subject_type</th>
                                 </tr>
                            </thead>
                            <tbody>
                                @foreach ($getRecord as $valueClass)
                                    <tr>
                                        <td>{{ $valueClass->id }}</td>
                                        <td>{{ $valueClass->class_name }}</td>
                                        <td>{{ $valueClass->subject_name }}</td>

                                        <td>{{ $valueClass->subject_type }}</td>


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
