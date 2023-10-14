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
                                <h1>My Account</h1>
                    </div>
                </section>


                <section class="content">
                    <div class="container-fluid">
                        <div class="row">

                            <div class="col-md-12">
@include('message')
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">My Account Edit</h3>
                                    </div>

                                    <form action="" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="card-body ">
                                            <div class="row">

                                                <div class="form-group col-md-6">
                                                    <label for="name">First Name</label>
                                                    <input type="text" name="name" class="form-control" id="name"
                                                        placeholder="First Name" value="{{old('name',$getRecord->name)}}">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="name">Last Name</label>
                                                    <input type="text" name="last_name" class="form-control"
                                                        placeholder="Last Name" value="{{ old('last_name',$getRecord->last_name)}}">
                                                </div>
                                                
                                                <div class="form-group col-md-6">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" id="email" name="email"
                                                        placeholder="Enter email" value="{{ old('email',$getRecord->email) }}">
                                                    <div style="color: red">{{ $errors->first('email') }}</div>

                                                </div>

 

                                                <div class="form-group col-md-6">
                                                    <label>Mobile Number</label>
                                                    <input type="number" name="mobile_number" class="form-control"
                                                        placeholder="Mobile Number" value="{{ old('mobile_number',$getRecord->mobile_number) }}">
                                                    <div style="color: red">{{ $errors->first('mobile_number') }}</div>

                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Profile Picture</label>
                                                    <input type="file" name="profile_picture" class="form-control"
                                                        placeholder="Profile Picture">
                                                        @if(!empty($getRecord->getProfile()))
                                                        <img src="{{$getRecord->getProfile()}}" 
                                                       style="height: :100px; width:100px;">
                                                       @endif
                                                </div>

                                              

                                                

                                                <div class="form-group col-md-6">
                                                    <label>Date Of Birth</label>
                                                    <input type="date" name="date_of_birth" class="form-control"
                                                        placeholder="Date Of Birth" 
                                                        value="{{ old('date_of_birth',$getRecord->date_of_birth) }}">
                                                </div>

                                            
                                                



                                                <div class="form-group col-md-6">
                                                    <label>Experience  </label>
                                                    <input type="text" name="experience" class="form-control"
                                                        placeholder="experience  " value="{{ old('experience',$getRecord->experience) }}">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Qualification</label>
                                                    <input type="text" name="Qualification" class="form-control"
                                                        placeholder="Qualification	" value="{{ old('Qualification	',$getRecord->Qualification) }}">
                                                    <div style="color: red">{{ $errors->first('Qualification	') }}</div>

                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Martial Status</label>
                                                    <input type="text" name="martial_status" class="form-control"
                                                        placeholder="martial_status" value="{{ old('martial_status',$getRecord->martial_status) }}">
                                                    <div style="color: red">{{ $errors->first('martial_status') }}</div>

                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Current Address</label>
                                                    <input type="text" name="address" class="form-control"
                                                        placeholder="address" value="{{ old('address',$getRecord->address) }}">
                                                    <div style="color: red">{{ $errors->first('address') }}</div>

                                                </div>


                                            </div>


                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                    </form>
                                </div>


                            </div>

                        </div>

                    </div>
                </section>

            </div>
        @endsection
