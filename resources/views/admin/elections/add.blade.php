@extends('layouts.app')


@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Form elements </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Forms</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Form elements</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Election Details</h4>
                        @include('message')

                        <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Name <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" value="{{ old('name') }}" style="color:white"
                                            class="form-control" name="name" required id="exampleInputUsername1"
                                            placeholder="Username">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Description <span
                                                class="text-danger">*</span></label>
                                        <input type="text" required row="20" value="{{ old('description') }}"
                                            style="color:white" class="form-control" name="description"
                                            id="exampleInputUsername1" placeholder="Description">
                                    </div>
                                </div>
                            </div>
                            

                            
                            
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1"> Start Date<span class="text-danger">*</span>
                                        </label>
                                        <input type="date" value="{{ old('start_date') }}" style="color:white"
                                            class="form-control" name="start_date" required id="exampleInputUsername1"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">End Date</label>
                                <input type="date" value="{{ old('end_date') }}" style="color:white"
                                    class="form-control" name="end_date" id="exampleInputEmail1" placeholder="Email">
                                
                                    </div>
                                </div>
                            </div>
                            <hr>

                            

                            
                            


                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                            <button class="btn btn-dark"><a href="{{ url('admin/admin/list') }}"
                                    class="nav-link">Cancel</a></button>
                        </form>
                    </div>
                </div>
            </div>




        </div>
    </div>
@endsection
