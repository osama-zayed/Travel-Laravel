@extends('admin.layout.master')
@section('content')

<h1></h1>

<div class="page-header">
        <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-airplane-takeoff"></i>
                </span> {{__('admin.flight')}}
        </h3>
        <div>
            <a href="{{route('admin.flight_1.index')}}" class="btn btn-gradient-primary btn-rounded btn-fw">Back</a>
        </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{__('admin.editFlight')}}</h4>
                <form method="post" action="{{route('admin.flight_1.update', $flight->id)}}" class="forms-sample" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                     <div class="form-group">
                        <label for="flight_number" class="col-sm-3 col-form-label">{{__('admin.flight_number')}}  </label>
                        <input type="text" class="form-control" name="flight_number" value="{{ $flight->flight_number }}"  placeholder="{{__('admin.flight_number')}}">
                        @error('flight_number')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                        <div class="form-group">
                        <label for="airline" class="col-sm-3 col-form-label">{{__('admin.airline')}}</label>
                          <input type="text" class="form-control"   id="airline" name="airline" value="{{ $flight->airline }}" placeholder="{{__('admin.airline')}}">
                          @error('airline')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>

                        <div class="form-group">
                        <label for="plane_id" class="col-sm-3 col-form-label">{{__('admin.Plane')}}</label>
                        <select class="form-control" id="plane_id" name="plane_id" value="{{ $flight->plane_id }}"  required >
                        <option value="">{{__('admin.select_plane')}}</option>
                        @foreach ($planes as $plane)
                          <option value="{{ $plane->id }}">{{ $plane->model }}</option>
                                     @endforeach
                       </select>
                          @error('plane_id')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>

                        <div class="form-group">
                        <label for="route_id" class="col-sm-3 col-form-label">{{__('admin.Route')}}</label>
                        <select class="form-control" id="route_id" name="route_id" required>
                            <option value="">{{__('admin.select_route')}}</option>
                               @foreach($routes as $route)
                            <option value="{{ $route->id }}">
                            {{ $route->departureAirport->city }} ({{ $route->departureAirport->code }}) إلى {{ $route->arrivalAirport->city }} ({{ $route->arrivalAirport->code }})
                    </option>
                              @endforeach
                       </select>
                          @error('route_id')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>

                        <div class="form-group">
                        <label for="date" class="col-sm-3 col-form-label">{{__('admin.date')}}</label>
                          <input type="date" class="form-control"   id="date" name="date" value="{{ $flight->date}}" placeholder="{{__('admin.date')}}">
                          @error('date')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>

                        <div class="form-group">
                        <label for="day" class="col-sm-3 col-form-label">{{__('admin.day')}}</label>
                          <select name="day" class="form-control" placeholder="{{__('admin.day')}}" required>
                           <option value="Friday">{{__('admin.Friday')}}</option>
                           <option value="Saturday">{{__('admin.Saturday')}}</option>
                           <option value="Sunday">{{__('admin.Sunday')}}</option>
                           <option value="Monday">{{__('admin.Monday')}}</option>
                           <option value="Tuesday">{{__('admin.Tuesday')}}</option>
                           <option value="Wednesday">{{__('admin.Wednesday')}}</option>
                           <option value="Thursday">{{__('admin.Thursday')}}</option>
                        </select>
                          @error('day')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>

                        <div class="form-group">
                        <label for="departure_time" class="col-sm-3 col-form-label">{{__('admin.departure_time')}}</label>
                          <input type="time" class="form-control"   id="departure_time" name="departure_time" value="{{ $flight->departure_time}}" placeholder="{{__('admin.departure_time')}}">
                          @error('departure_time')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>

                        <div class="form-group">
                        <label for="arrival_time" class="col-sm-3 col-form-label">{{__('admin.arrival_time')}}</label>
                          <input type="time" class="form-control"   id="arrival_time" name="arrival_time" value="{{ $flight->arrival_time}}" placeholder="{{__('admin.arrival_time')}}">
                          @error('arrival_time')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>

                      <div class="form-group">
                        <label for="status" class="col-sm-3 col-form-label">{{__('admin.status')}}</label>
                        <select name="status" class="form-control" value="{{ $flight->status}}" required>
                          <option value="scheduled">{{__('admin.scheduled')}}</option>
                          <option value="delayed">{{__('admin.delayed')}}</option>
                          <option value="cancelled">{{__('admin.cancelled')}}</option>
                        </select>
                     @error('status')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>

                    <button type="submit" class="btn btn-gradient-primary me-2">{{__('admin.Update')}}</button>

                    <a href="{{route('admin.flight_1.create')}}" class="btn btn-light">{{__('admin.cancel')}}</a>
                </form>
            </div>
        </div>
    </div>


@endsection

<!--  {{__('admin.')}}  -->
