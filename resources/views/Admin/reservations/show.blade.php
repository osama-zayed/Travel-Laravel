

@extends('admin.layout.master')
@section('content')


@extends('admin.layout.master')
@section('content')

<h1></h1>

    <div class="page-header">
        <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-airplane-takeoff"></i>
                </span><h2> {{__('admin.ticket_details')}} </h2>
        </h3>
        <div>
            <a href="{{route('admin.reservation_1.index')}}" class="btn btn-gradient-primary btn-rounded btn-fw">Back to Index </a>
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
                            <hr>
                        <h3>{{__('admin.reservation_information')}}</h3>
                        <p><strong> # : </strong> {{ $reservation->id }}</p>
    <p><strong>{{__('admin.reservation_code')}} : </strong> {{ $reservation->reservation_code }}</p>
    <p><strong>{{__('admin.airline')}}  : </strong> {{ $reservation->flight->airline }}</p>
    <p><strong>{{__('admin.flight_number')}} : </strong>  <a href="{{route('admin.flight_1.show', $reservation->flight->id)}}">{{ $reservation->flight->flight_number }}</a></p>
    <p><strong>{{__('admin.flight')}} : </strong>{{$reservation->flight->route->departureAirport->city }} --> {{ $reservation->flight->route->arrivalAirport->city }}</p></p>
    <p><strong>{{__('admin.flight_date')}} : </strong>{{$reservation->flight->date}}</p>
    <p><strong>{{__('admin.time')}} : </strong>{{$reservation->flight->departure_time}}-->{{$reservation->flight->arrival_time}}</p>
    <p><strong>{{__('admin.seat_class')}} : </strong> {{ $reservation->seat_class }}</p>
    <p><strong>{{__('admin.seat_class')}} : </strong> {{ $reservation->seat_class }}</p>
    <p><strong>{{__('admin.gate')}} : </strong> - </p>

                        </tr>
                        <div>
<hr>
        <h3>{{__('admin.passenger_information')}}</h3>
        @foreach ($reservation->passengers as $passenger)
            <p><strong>{{__('admin.first_name')}} : </strong> {{ $passenger->first_name }}</p>
            <p><strong>{{__('admin.last_name')}} : </strong> {{ $passenger->last_name }}</p>
            <p><strong>{{__('admin.age')}} : </strong> {{ $passenger->dob }}</p>
            <p><strong>{{__('admin.gender')}} : </strong> {{ $passenger->gender }}</p>
            <p><strong>{{__('admin.email')}} : </strong> {{ $passenger->email }}</p>
            <p><strong>{{__('admin.phone')}} : </strong> {{ $passenger->phone }}</p>
            <p><strong>{{__('admin.address')}} : </strong> {{ $passenger->address }}</p>
            <p><strong>{{__('admin.passport_number')}} : </strong> {{ $passenger->passport_number }}</p>
            <p><strong>{{__('admin.passport_date')}} : </strong> {{ $passenger->passport_date }}</p>
            <p><strong>{{__('admin.passport_image')}} : </strong> {{ $passenger->passport_image }}</p>
        @endforeach
    </div>
                     </thead>
                        <tbody>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection


<h1></h1>

    <div class="page-header">
        <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-airplane-takeoff"></i>
                </span><h2> {{__('admin.reservation_details')}} </h2>
        </h3>
        <div>
            <a href="{{route('admin.reservation_1.index')}}" class="btn btn-gradient-primary btn-rounded btn-fw">Back to Index </a>
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

                        <p><strong> ID : </strong> {{ $reservation->id }}</p>
    <p><strong>{{__('admin.reservation_code')}} : </strong> {{ $reservation->reservation_code }}</p>
    <p><strong>{{__('admin.flight_number')}} : </strong>  <a href="{{route('admin.flight_1.show', $reservation->flight->id)}}">{{ $reservation->flight->flight_number }}</a></p>
    <p><strong>{{__('admin.flight')}} : </strong>{{$reservation->flight->route->departureAirport->city }} --> {{ $reservation->flight->route->arrivalAirport->city }}</p></p>
    <p><strong>{{__('admin.user')}} : </strong> {{ $reservation->user->name }}</p>
    <p><strong>{{__('admin.reservation_date')}} : </strong> {{ $reservation->reservation_date }}</p>
    <p><strong>{{__('admin.pass_num')}}  : </strong> {{ $reservation->pass_num}}</p>
    <p><strong>{{__('admin.seat_class')}} : </strong> {{ $reservation->seat_class }}</p>
    <p><strong>{{__('admin.status')}} : </strong> {{ $reservation->status }}</p>

                        </tr>
                        <div>

        <h2>Passenger Details</h2>
        @foreach ($reservation->passengers as $passenger)
            <p><strong>{{__('admin.first_name')}} : </strong> {{ $passenger->first_name }}</p>
            <p><strong>{{__('admin.last_name')}} : </strong> {{ $passenger->last_name }}</p>
            <p><strong>{{__('admin.age')}} : </strong> {{ $passenger->dob }}</p>
            <p><strong>{{__('admin.gender')}} : </strong> {{ $passenger->gender }}</p>
            <p><strong>{{__('admin.email')}} : </strong> {{ $passenger->email }}</p>
            <p><strong>{{__('admin.phone')}} : </strong> {{ $passenger->phone }}</p>
            <p><strong>{{__('admin.address')}} : </strong> {{ $passenger->address }}</p>
            <p><strong>{{__('admin.passport_number')}} : </strong> {{ $passenger->passport_number }}</p>
            <p><strong>{{__('admin.passport_date')}} : </strong> {{ $passenger->passport_date }}</p>
            <p><strong>{{__('admin.passport_image')}} : </strong> {{ $passenger->passport_image }}</p>
        @endforeach
    </div>
                     </thead>
                        <tbody>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

