@extends('layouts.app')

@section('content')
<!-- Main content -->
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
            </div>
         </div>
      </div>
      <!-- /.container-fluid -->
   </section>
   <section class="content">
      @include('message')

      @foreach ($getRecord as $value)
      <div class="card">
         <div class="card-header">
            <h1 class="card-title">{{ $value['name'] }}</h1>
         </div>
         <div class="card-body p-0">
            <table class="table table-sm">
               <thead>
                  <tr>
                     <th>Week</th>
                     <th>Start Time</th>
                     <th>End Time</th>
                     <th>Room Number</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($value['week'] as $weekData)
                  <tr>
                     <td>{{ $weekData['Week_name'] }}</td>

                     <td>{{!empty($weekData['start_time'])?date('h:i:A',strtotime($weekData['start_time'])):'' }}</td>
                     <td>{{!empty($weekData['end_time'])?date('h:i:A',strtotime($weekData['end_time'])):'' }}</td>
                     <td>{{ $weekData['room_number'] }}</td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
      @endforeach
   </section>
</div>
@endsection
