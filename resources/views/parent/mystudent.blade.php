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
      <div class="row">
         <div class="col-md-12">
            @include('message')
            <div class="card">
               <div class="card-header">
                  <h1 class="card-title">Parent Student </h1>
                  <div class="card-body p-0">
                     <table class="table table-sm">
                        <thead>
                           <tr>
                              <th>Profile</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Class</th>
                              <th>Caste</th>
                              <th>status</th>
                              <th>Religion</th>
                              <th>Height</th>
                              <th>Weight</th>
                              <th>Blood Group</th>
                              <th>Created Date</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($getRecord as $userValue)
                           <tr>
                              <td>
                                 @if (!empty($userValue->getProfile()))
                                 <img src="{{ $userValue->getProfile() }}"
                                    style="height: :30px; width:30px; border-radius:20px;">
                                 @endif
                              </td>
                              <td>{{ $userValue->name }}{{ $userValue->last_name }}</td>
                              <td>{{ $userValue->email }}</td>
                              <td>{{ $userValue->class_name }}</td>
                              <td>{{ $userValue->caste }}</td>
                              <td>{{($userValue->status==0)? 'Active' : 'InActive'}}</td>
                              <td>{{ $userValue->religion }}</td>
                              <td>{{ $userValue->height }}</td>
                              <td>{{ $userValue->weight }}</td>
                              <td>{{ $userValue->blood_group }}</td>
                              <td>{{ $userValue->created_at }}</td>
                              <td>
                                 <a class="btn btn-primary" href="{{Url('parent/mystudentSubject/'.$userValue->id)}}" class="btn btn-primary">Subjects</a>
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