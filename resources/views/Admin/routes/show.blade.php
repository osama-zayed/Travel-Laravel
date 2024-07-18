

@extends('admin.layout.master')
@section('content')

<h1></h1>

    <div class="page-header">
        <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-airplane-takeoff"></i>
                </span><h2> {{__('admin.route_details')}} </h2>
        </h3>
        <div>
            <a href="{{route('admin.route_1.index')}}" class="btn btn-gradient-primary btn-rounded btn-fw">Back to Index </a>
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

                        <p><strong> ID : </strong> {{ $route->id }}</p>
    <p><strong>{{__('admin.departure')}} : </strong> {{ $route->departureAirport->city}}</p>
    <p><strong>{{__('admin.arrival')}} : </strong>  {{$route->arrivalAirport->city }}</p>
    <p><strong>{{__('admin.distance')}} : </strong> {{ $route->distance }}</p>
    <p><strong>{{__('admin.duration')}} : </strong> {{ $route->duration }}</p>

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

