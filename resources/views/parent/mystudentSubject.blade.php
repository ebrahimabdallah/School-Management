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
         @include('message')
         <h1>Subjects Student <span style="color: rgb(12, 92, 240)">{{$getUser->name}}</span></h1>
         <div class="card">
            <div class="card-header">
               <div class="card-body p-0">
                  <table class="table table-sm">
                     <thead>
                        <tr>
                           <th>Subject</th>
                           <th>Type</th>
                           <th>Started Date</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($getRecord as $value)
                        <tr>
                           <td>{{ $value->subject_name }} </td>
                           <td>{{ $value->subject_type }} </td>
                           <td>{{ date('d-m-Y', strtotime($value->created_at)) }} </td>
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