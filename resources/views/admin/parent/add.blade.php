@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <body class="hold-transition sidebar-mini">
        <div class="wrapper">

            <div class="content-wrapper">
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">

                            </div>
                            <div class="col-sm-12">
                                <ol class="breadcrumb float-sm-right">
                                    <a href="{{ url('admin/student/list') }}" class="btn btn-primary">Admins</a>
                                </ol>
                            </div>
                        </div>
                    </div>
                </section>


                <section class="content">
                    <div class="container-fluid">
                        <div class="row">

                            <div class="col-md-12">

                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Add New Student</h3>
                                    </div>

                                    <form action="" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="card-body ">
                                            <div class="row">

                                                <div class="form-group col-md-6">
                                                    <label for="name">First Name</label>
                                                    <input type="text" name="name" class="form-control" id="name"
                                                        placeholder="First Name" value="{{ old('name') }}">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="name">Last Name</label>
                                                    <input type="text" name="last_name" class="form-control"
                                                        placeholder="Last Name" value="{{ old('last_name') }}">
                                                </div>
                                                <div class="form-group  col-md-6">
                                                    <label for="password">Password</label>
                                                    <input type="password" name="password" class="form-control"
                                                        id="password" placeholder="Password">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" id="email" name="email"
                                                        placeholder="Enter email" value="{{ old('email') }}">
                                                    <div style="color: red">{{ $errors->first('email') }}</div>

                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="job">JOB</label>
                                                    <input type="text" class="form-control" id="job" name="job"
                                                        placeholder="Enter job" value="{{ old('job') }}">
                                                    <div style="color: red">{{ $errors->first('job') }}</div>

                                                </div>


                                                <div class="form-group col-md-6">
                                                    <label for="address">ADDRESS</label>
                                                    <input type="text" class="form-control" id="address" name="address"
                                                        placeholder="Enter address" value="{{ old('address') }}">
                                                    <div style="color: red">{{ $errors->first('address') }}</div>

                                                </div>



                                                <div class="form-group col-md-6">
                                                    <label>Admission Number</label>
                                                    <input type="text" name="admission_number" class="form-control"
                                                        placeholder="admission Number"
                                                        value="{{ old('admission_number') }}">
                                                    <div style="color: red">{{ $errors->first('admission_number') }}</div>

                                                </div>


                                                <div class="form-group col-md-6">
                                                    <label>Roll Number</label>
                                                    <input type="number" name="roll_number" class="form-control"
                                                        placeholder="Roll Number" value="{{ old('roll_number') }}">
                                                    <div style="color: red">{{ $errors->first('roll_number') }}</div>

                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Mobile Number</label>
                                                    <input type="number" name="mobile_number" class="form-control"
                                                        placeholder="Mobile Number" value="{{ old('mobile_number') }}">
                                                    <div style="color: red">{{ $errors->first('mobile_number') }}</div>

                                                </div>
                                                

                                                <div class="form-group col-md-6">
                                                    <label>Gender</label>
                                                    <select name="gender" class="form-control">
                                                        <option value="">Select Gender</option>
                                                        <option {{ old('gender' == 'male') ? 'selected' : '' }}value="male">Male
                                                        </option>
                                                        <option {{ old('gender' == 'female') ? 'selected' : '' }} value="female">
                                                            Female</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Profile Picture</label>
                                                    <input type="file" name="profile_picture" class="form-control" 
                                                        placeholder="Profile Picture" >
                                                </div>
                                                
                                                
                                                <div class="form-group col-md-6">
                                                    <label>Status</label>
                                                    <select name="status" class="form-control">
                                                        <option value="">Select Status</option>
                                                        <option {{ old('status' == 0) ? 'selected' : '' }}value="0">Active
                                                        </option>
                                                        <option {{ old('status' == 1) ? 'selected' : '' }} value="1">
                                                            Inactive</option>
                                                    </select>
                                                </div> 

                                             

                                                <div class="form-group col-md-6">
                                                    <label>Date Of Birth</label>
                                                    <input type="date" name="date_of_birth" class="form-control"
                                                        placeholder="Date Of Birth">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Admission Date</label>
                                                    <input type="date" name="admission_date" class="form-control"
                                                        placeholder="Admission Date" value="{{ old('admission_date') }}">

                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Caste</label>
                                                    <input type="text" name="caste" class="form-control"
                                                        placeholder="Caste" value="{{ old('caste') }}">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Religion</label>
                                                    <input type="text" name="religion" class="form-control"
                                                        placeholder="Religion" value="{{ old('religion') }}">
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
        @endsection
