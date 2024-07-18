@extends('admin.layout.master')
@section('content')

<h1></h1>

    <div class="page-header">
        <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-call-split"></i>
                </span> {{__('admin.Route')}}
        </h3>
        <div>
            <a href="{{route('admin.route_1.create')}}" class="btn btn-gradient-primary btn-rounded btn-fw">Add Route</a>
        </div>
       @if(Session::has('success'))
           <p>{{Session::get('success')}}</p>
           @endif

    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{__('admin.Route')}}</h4>

                    <table class="table table-striped">
                        <thead>
                          <tr>
                             <th> ID </th>
                             <th> {{__('admin.departure')}} </th>
                             <th> {{__('admin.arrival')}} </th>
                             <th> {{__('admin.distance')}} </th>
                             <th> {{__('admin.duration')}} </th>
                             <th> {{__('admin.action')}} </th>
                         </tr>
                        </thead>
                        <tbody>

                          @foreach($routes as $route)

                          <tr>
                               <td>   {{$route->id}}    </td>

                              <td><a href="{{route('admin.airport_1.show', $route->departureAirport->id)}}"> {{ $route->departureAirport->code }}</a></td> </td>

                               <td><a href="{{route('admin.airport_1.show', $route->arrivalAirport->id)}}"> {{$route->arrivalAirport->code}}   </td>

                               <td>  {{$route->distance}}   </td>

                               <td>  {{$route->duration}}   </td>

                               <td>
                               <a href="{{ route('admin.route_1.show', $route->id) }}" class="btn btn-gradient-primary me-2">{{__('admin.View Details')}}</a>

                                  <a href="{{route('admin.route_1.edit', $route->id)}}" class="btn btn-gradient-primary me-2">  {{__('admin.Edit')}} </a>

                                  <form method="POST" action="{{route('admin.route_1.destroy' , $route->id)}}" style="display: inline;" >
                                      @csrf
                                      @method('DELETE')
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


