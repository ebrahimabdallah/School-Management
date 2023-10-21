@extends('layouts.app')
@section('content')
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
      <div class="container-fluid">
         {{-- filter --}}
         <div class="row">
            <div class="col-md-12">
               <div class="card card-primary">
                  <div class="card-header">
                     <h3 class="card-title">Search Class</h3>
                  </div>
                  <!-- form start -->
                  <form action="" method="get">
                    <div class="card-body">
                        <div class="row">
                           <div class="form-group col-sm-3">
                              <label>Class Name</label>
                              <select name="class_id" id="" class="form-control getClass">
                                 <option value="">Select Class</option>
                                 @foreach ($getClass as $class)
                                 <option {{ (Request::get('class_id') == $class->id) ? 'selected' : '' }}
                                 value="{{ $class->id }}">{{ $class->name }}</option>
                                 @endforeach
                              </select>
                           </div>
                           <div class="form-group col-sm-3">
                              <label for>Subject Name</label>
                              <select name="subject_id" id="" class="form-control getSubject">
                                 <option value="">Select Class</option>
                                 @foreach ($getSubject as $subject)
                                 <option {{ (Request::get('subject_id') == $subject->subject_id) ? 'selected' : '' }}
                                 value="{{ $subject->subject_id }}">{{ $subject->subject_name }}</option>
                                 @endforeach
                              </select>
                           </div>
                           <div class="form-group col-md-3">
                              <button class="btn btn-primary" style="margin-top: 30px;">Search</button>
                              <a href="{{ url('assign/list') }}" class="btn btn-success"
                                 style="margin-top: 30px;">Clear</a>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
         {{-- end filter --}}
         <!-- Main content -->
         @if(!empty(Request::get('class_id')) && !empty(Request::get('subject_id')))

         <div class="card">
            <div class="card-header">

               <h1 class="card-title">Time Class</h1>
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

                     @foreach ($Week as $value)
                     <tr>
                        <th>
                           {{$value['Week_name']}}
                        </th>
                        <th>
                           <input type="time" name="start_time" class="form-control">
                        </th>
                        <th>
                           <input type="time" name="end_time" class="form-control">
                        </th>
                        <th>
                           <input type="text" name="room_number" class="form-control"  style="width: 150px;">
                        </th>
                     </tr>
                     @endforeach
                   </tbody>
               </table>
               <div style="text-align: center; padding:20px;" >
                  <button class="btn btn-primary">Submit</button>
               </div>
            </div>
         </div>
        </div>
@endif

   </section>
</div>
@endsection
@section('script')
<script type="text/javascript">
   $('.getClass').change(function() {
       var class_id = $(this).val();
       $.ajax({
           url: "{{ url('admin/ClassTime/get_subject') }}",
           type:"POST",
           data: {
               "_token": "{{ csrf_token() }}",
               class_id: class_id,
           },
           dataType: "json",
           success: function(response) {
               $('.getSubject').html(response.html);
           },
       });
   });
</script>
@endsection
