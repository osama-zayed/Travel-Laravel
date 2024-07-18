

@extends('admin.layout.master')
@section('content')

<h1></h1>

    <div class="page-header">
        <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-airplane-takeoff"></i>
                </span><h2> {{__('admin.Flight Details')}} </h2>
        </h3>
        <div>
            <a href="{{route('admin.flight_1.index')}}" class="btn btn-gradient-primary btn-rounded btn-fw">Back to Index </a>
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

                        <p><strong> ID : </strong> {{ $flight->id }}</p>
    <p><strong>{{__('admin.flight_number')}} : </strong> {{ $flight->flight_number }}</p>
    <p><strong>{{__('admin.airline')}}  : </strong> {{ $flight->airline }}</p>
    <p><strong>{{__('admin.Plane')}} : </strong> {{ $flight->plane->model }}</p>
    <p><strong>{{__('admin.Route')}} : </strong>  {{$flight->route->departureAirport->city }} --> {{ $flight->route->arrivalAirport->city }}</p>
    <p><strong>{{__('admin.day')}} : </strong> {{ $flight->day }}</p>
    <p><strong>{{__('admin.date')}} : </strong> {{ $flight->date }}</p>
    <p><strong>{{__('admin.departure_time')}}  : </strong> {{ $flight->departure_time }}</p>
    <p><strong>{{__('admin.arrival_time')}} : </strong> {{ $flight->arrival_time }}</p>
    <p><strong>{{__('admin.status')}} : </strong> {{ $flight->status }}</p>
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

