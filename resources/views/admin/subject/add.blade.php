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
                                    <a href="{{ url('subject/list') }}" class="btn btn-primary">Subjects</a>
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
                                        <h3 class="card-title">Add New Subject</h3>
                                    </div>
                                     <!-- form start -->
                                    <form  action="" method="post">
                                        {{csrf_field()}}
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" name="name" class="form-control" id="name"
                                                    placeholder="Your name"  >
                                            </div>

                                            <div class="form-group">
                                                <label for="name">Type</label>
                                                <select class="form-control" name="type" id="type">
                                                    <option value=" ">Subject Type</option>
                                                    <option value="theory">theory</option>
                                                    <option value="practical">Practical</option>

                                                </select>
                                             </div>
                                                <div class="form-group">
                                                    <label for="name">Status</label>
                                                    <select class="form-control" name="status" id="status">
                                                          <option value="0">Active</option>
                                                        <option value="1">In active</option>

                                                    </select>
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
         @endsection