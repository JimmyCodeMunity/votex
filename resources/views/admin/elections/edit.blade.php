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
                                        <input type="text" value="{{ old('name',$getRecord->name)}}" style="color:white"
                                            class="form-control" name="name"  id="exampleInputUsername1"
                                            placeholder="Username">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Description <span
                                                class="text-danger">*</span></label>
                                        <input type="text" value="{{ old('description',$getRecord->description)}}" style="color:white"
                                            class="form-control" name="description" id="exampleInputUsername1"
                                            placeholder="Description">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Start Date <span
                                                class="text-danger">*</span> </label>
                                        <input type="text" value="{{ old('start_date',$getRecord->start_date)}}" style="color:white"
                                            class="form-control" name="start_date" id="exampleInputUsername1"
                                            placeholder="Start Date">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">End Date <span
                                                class="text-danger">*</span></label>
                                        <input type="text"  value="{{ old('end_date',$getRecord->end_date)}}" style="color:white"
                                            class="form-control" name="end_date" id="exampleInputUsername1"
                                            placeholder="End Date">
                                    </div>
                                </div>
                            </div>
                            

                            
                            


                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                            <button class="btn btn-dark"><a href="{{ url('admin/elections/list') }}"
                                    class="nav-link">Cancel</a></button>
                        </form>
                    </div>
                </div>
            </div>




        </div>
    </div>
@endsection
