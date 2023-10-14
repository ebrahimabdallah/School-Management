@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1></h1>
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
                                    <h3 class="card-title">Change Password</h3>
                                </div>

                                <form action=" " method="post">
                                    @csrf

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Old Password</label>
                                            <input type="password" name="oldPassword"
                                                                                        class="form-control"
                                                placeholder="Your Old Password">
                                        </div>
                                        <div class="form-group">
                                            <label>New Password</label>
                                            <input type="password" name="newPassword" class="form-control"
                                                placeholder="Your New Password">
                                        </div>

                                    
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Change</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection