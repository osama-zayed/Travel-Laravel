@extends('layouts.app')

@section('content')
    <h1>معلومات المطار</h1>



    @extends('admin.layout.master')
@section('content')

<h1></h1>

    <div class="page-header">
        <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-airplane-takeoff"></i>
                </span><h2> {{__('admin.airport_details')}} </h2>
        </h3>
        <div>
            <a href="{{route('admin.airport_1.index')}}" class="btn btn-gradient-primary btn-rounded btn-fw">Back to Index </a>
        </div>
       @if(Session::has('success'))
           <p>{{Session::get('success')}}</p>
           @endif

</div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <table class="table table-striped">
                        <thead>
                        <tr>

                        <p><strong> ID : </strong> {{ $airport->id }}</p>
    <p><strong>{{__('admin.name')}} : </strong> {{ $airport->name }}</p>
    <p><strong>{{__('admin.country')}}  : </strong> {{ $airport->country }}</p>
    <p><strong>{{__('admin.city')}}  : </strong> {{ $airport->city }}</p>
    <p><strong>{{__('admin.code')}} : </strong> {{ $airport->code }}</p>
    <p><strong>{{__('admin.created_at')}}  : </strong> {{ $airport->created_at }}</p>
    <p><strong>{{__('admin.updated_at')}} : </strong> {{ $airport->updated_at }}</p>
                        </tr>
                     </thead>
                        <tbody>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
