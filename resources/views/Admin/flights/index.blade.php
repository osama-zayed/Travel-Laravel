@extends('admin.layout.master')
@section('content')

<h1></h1>

    <div class="page-header">
        <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-airplane-takeoff"></i>
                </span> {{__('admin.flights_list')}}
        </h3>
        <div>
            <a href="{{route('admin.flight_1.create')}}" class="btn btn-gradient-primary btn-rounded btn-fw">Add Flight</a>
        </div>
       @if(Session::has('success'))
           <p>{{Session::get('success')}}</p>
           @endif

    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{__('admin.flights')}}</h4>

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th> ID </th>
                            <th> {{__('admin.flight_number')}} </th>

                            <th> {{__('admin.airline')}} </th>

                            <th> {{__('admin.Plane')}} </th>

                            <th> {{__('admin.Route')}} </th>

                            <th> {{__('admin.day')}} </th>

                            <th> {{__('admin.date')}} </th>

                            <th> {{__('admin.departure_time')}} </th>

                            <th> {{__('admin.arrival_time')}} </th>

                            <th> {{__('admin.status')}} </th>

                            <th> {{__('admin.action')}} </th>
                        </tr>
                     </thead>
                        <tbody>

                        @foreach($flights as $flight)

                        <tr>
                            <td >  {{$flight->id}} </td>

                            <td>  {{$flight->flight_number}}</a></td>

                            <td>  {{$flight->airline}} </td>

                            <td> <a href="{{route('admin.plane_1.show', $flight->plane->id)}}" >  {{$flight->plane->model}} </a></td>

                            <td> <a href="{{route('admin.route_1.show', $flight->route->id)}}" > {{$flight->route->departureAirport->city }} --> {{ $flight->route->arrivalAirport->city }} </a></td>

                            <td>   {{$flight->day}} </td>

                            <td>   {{$flight->date}} </td>

                            <td>   {{$flight->departure_time}} </td>

                            <td>   {{$flight->arrival_time}} </td>

                            <td>   {{$flight->status}} </td>


                          <td>
                          <a href="{{ route('admin.flight_1.show', $flight->id) }}" class="btn btn-gradient-primary me-2">{{__('admin.View Details')}}</a>

                              <a href="{{route('admin.flight_1.edit', $flight->id)}}" class="btn btn-gradient-primary me-2">  {{__('admin.Edit')}}</a>

                                <form method="post"  action="{{route('admin.flight_1.destroy' , $flight->id)}}" style="display: inline;">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-light" onclick="return confirm('Are you sure ')">  {{__('admin.Delete')}} </button>
                                </form>

                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
