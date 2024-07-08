@extends('layouts.app')


@section('content')
    <div class="content-wrapper">



        <div class="row">
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{ Auth::user()->name }}</h3>
                                    <p class="text-success ms-2 mb-0 font-weight-medium"></p>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-success ">
                                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">{{ Auth::user()->email }}</h6>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($getCandidates as $candidate)
                    <div class="col-xl-4 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="d-flex align-items-center align-self-start">
                                            <h5 class="mb-0">{{$candidate->name}}</h5>

                                        </div>
                                    </div>
                                    <div class="col-4">

                                        <img class="img-lg rounded-circle" src="{{asset($candidate->profile_pic)}}"  alt="">

                                    </div>
                                </div>
                                <h6 class="text-success font-weight-normal">{{ $candidate->email }}</h6>
                                <a href="{{ url('user/voting/vote', $candidate->id) }}" class="btn btn-primary">Vote</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>





    </div>
@endsection
