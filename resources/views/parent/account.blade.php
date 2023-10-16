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
            </div>
         </div>
      </section>
      <section class="content">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-12">
                  @include('message')
                  <div class="card card-primary">
                     <div class="card-header">
                        <h3 class="card-title">Edit MyProfile</h3>
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
                                 <label>Mobile Number</label>
                                 <input type="number" name="mobile_number" class="form-control"
                                    placeholder="Mobile Number" value="{{ old('mobile_number',$getRecord->mobile_number) }}">
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
                                 <label>job</label>
                                 <input type="text" name="job" class="form-control"
                                    placeholder="job" value="{{ old('job',$getRecord->job) }}">
                              </div>
                              <div class="form-group col-md-6">
                                 <label>Address</label>
                                 <input type="text" name="address" class="form-control"
                                    placeholder="address" value="{{ old('address',$getRecord->address) }}">
                              </div>
                              <div class="form-group col-md-6">
                                 <label>Religion</label>
                                 <input type="text" name="religion" class="form-control"
                                    placeholder="Religion" value="{{ old('religion',$getRecord->religion) }}">
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