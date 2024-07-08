@extends('layouts.app')


@section('content')
<div class="content-wrapper">

                    @if(Auth::user()->user_type == 1)
                    
                    <div class="row">
                        <div class="col-xl-4 col-sm-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-9">
                                            <div class="d-flex align-items-center align-self-start">
                                                <h3 class="mb-0">{{Auth::user()->name}}</h3>
                                                <p class="text-success ms-2 mb-0 font-weight-medium"></p>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="icon icon-box-success ">
                                                <span class="mdi mdi-arrow-top-right icon-item"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <h6 class="text-muted font-weight-normal">{{Auth::user()->email}}</h6>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xl-4 col-sm-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-9">
                                            <div class="d-flex align-items-center align-self-start">
                                                <h5 class="mb-0">Candidates</h5>
                                                
                                            </div>
                                        </div>
                                        <div class="col-3">
                                           
                                            <div class="icon icon-box-success ">
                                                <span class="mdi mdi-arrow-top-right icon-item"></span>
                                            </div>
                                           
                                        </div>
                                    </div>
                                    <h6 class="text-success font-weight-normal">{{$getCandidates->total()}}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-sm-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-9">
                                            <div class="d-flex align-items-center align-self-start">
                                                <h3 class="mb-0">Users</h3>
                                                <p class="text-success ms-2 mb-0 font-weight-medium"></p>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <a href="{{url('admin/user/list')}}">
                                            <div class="icon icon-box-success ">
                                                <span class="mdi mdi-arrow-top-right icon-item"></span>
                                            </div>
                                            </a>
                                        </div>
                                    </div>
                                    <h4 class="text-muted font-weight-normal">{{$getUsers->total()}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endif
                    
                    
                   
                    
                    
                </div>

@endsection