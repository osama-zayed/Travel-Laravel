@extends('admin.layout.master')
@section('content')

<h1></h1>

<div class="page-header">
        <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-airplane-takeoff "></i>
                </span> {{__('admin.flight_add')}}
        </h3>
        <div>
            <a href="{{route('admin.flight_1.index')}}" class="btn btn-gradient-primary btn-rounded btn-fw">Back</a>
        </div>
    </div>

    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">{{__('admin.createFlight')}}</h2>
                <p class="card-description"> Flight </p>
                <form method="post" action="{{route('admin.flight_1.store')}}" class="forms-sample" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="flight_number" class="col-sm-3 col-form-label">{{__('admin.flight_number')}}  </label>
                        <input type="text" class="form-control" name="flight_number" placeholder="{{__('admin.flight_number')}}">
                        @error('flight_number')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <!--
                    <div class="form-group">
                        <label for="from" class="col-sm-3 col-form-label">{{__('admin.from')}}</label>
                     <select name="from" id="from" class="form-control @error('from') is-invalid @enderror">

                               <option value="Sanaa" {{ old('from') == 'Sanaa' ? 'selected' : '' }}> Sana'a </option>
                                <option value="Aden" {{ old('from') == 'Aden' ? 'selected' : '' }}>Aden </option>
                                <option value="Cairo" {{ old('from') == 'Cairo' ? 'selected' : '' }}> Cairo </option>
                                <option value="Alexandria" {{ old('from') == 'Alexandria' ? 'selected' : '' }}>Alexandria </option>
                                <option value="Riyadh" {{ old('from') == 'Riyadh' ? 'selected' : '' }}> Riyadh </option>
                                <option value="Jeddah" {{ old('from') == 'Jeddah' ? 'selected' : '' }}>Jeddah </option>
                                <option value="Muscat" {{ old('from') == 'Muscat' ? 'selected' : '' }}> Muscat </option>
                                <option value="Salalah" {{ old('from') == 'Salalah' ? 'selected' : '' }}>Salalah </option>
                                <option value="Amman" {{ old('from') == 'Amman' ? 'selected' : '' }}>Amman </option>
                                <option value="Zarqa" {{ old('from') == 'Zarqa' ? 'selected' : '' }}> Zarqa </option>
                                <option value="Irbid" {{ old('from') == 'Irbid' ? 'selected' : '' }}>Irbid </option>
                       </select>
                     @error('from')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>

                        <div class="form-group">
                        <label for="to" class="col-sm-3 col-form-label">{{__('admin.to')}}</label>
                     <select name="to" id="to" class="form-control @error('to') is-invalid @enderror">

                     <option value="true" {{ old('from') == 'Sanaa' ? 'selected' : '' }}> Sana'a </option>
                                <option value="Aden" {{ old('to') == 'Aden' ? 'selected' : '' }}>Aden </option>
                                <option value="Cairo" {{ old('to') == 'Cairo' ? 'selected' : '' }}> Cairo </option>
                                <option value="Alexandria" {{ old('to') == 'Alexandria' ? 'selected' : '' }}>Alexandria </option>
                                <option value="Riyadh" {{ old('to') == 'Riyadh' ? 'selected' : '' }}> Riyadh </option>
                                <option value="Jeddah" {{ old('to') == 'Jeddah' ? 'selected' : '' }}>Jeddah </option>
                                <option value="Muscat" {{ old('to') == 'Muscat' ? 'selected' : '' }}> Muscat </option>
                                <option value="Salalah" {{ old('to') == 'Salalah' ? 'selected' : '' }}>Salalah </option>
                                <option value="Amman" {{ old('to') == 'Amman' ? 'selected' : '' }}>Amman </option>
                                <option value="Zarqa" {{ old('to') == 'Zarqa' ? 'selected' : '' }}> Zarqa </option>
                                <option value="Irbid" {{ old('to') == 'Irbid' ? 'selected' : '' }}>Irbid </option>

                                </select>
                     @error('to')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>   -->

                        <div class="form-group">
                        <label for="airline" class="col-sm-3 col-form-label">{{__('admin.airline')}}</label>
                          <input type="text" class="form-control"   id="airline" name="airline" placeholder="{{__('admin.airline')}}">
                          @error('airline')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>

                        <div class="form-group">
                        <label for="plane_id" class="col-sm-3 col-form-label">{{__('admin.Plane')}}</label>
                        <select class="form-control" id="plane_id" name="plane_id"required >
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
                        <label for="date" class="col-sm-3 col-form-label">{{__('admin.date')}}</label>
                          <input type="date" class="form-control"   id="date" name="date" placeholder="{{__('admin.date')}}">
                          @error('date')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>

                        <div class="form-group">
                        <label for="departure_time" class="col-sm-3 col-form-label">{{__('admin.departure_time')}}</label>
                          <input type="time" class="form-control"   id="departure_time" name="departure_time" placeholder="{{__('admin.departure_time')}}">
                          @error('departure_time')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>

                        <div class="form-group">
                        <label for="arrival_time" class="col-sm-3 col-form-label">{{__('admin.arrival_time')}}</label>
                          <input type="time" class="form-control"   id="arrival_time" name="arrival_time" placeholder="{{__('admin.arrival_time')}}">
                          @error('arrival_time')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>

                      <div class="form-group">
                        <label for="status" class="col-sm-3 col-form-label">{{__('admin.status')}}</label>
                        <select name="status" class="form-control" required>
                           <option value="scheduled">{{__('admin.scheduled')}}</option>
                           <option value="delayed">{{__('admin.delayed')}}</option>
                           <option value="cancelled">{{__('admin.cancelled')}}</option>
                        </select>
                     @error('status')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>

                        <div class="form-group">
            <label for="repeat_duration">مدة التكرار (بالأسابيع)</label>
            <input type="number" name="repeat_duration" class="form-control" value="{{ old('repeat_duration', 8) }}" required>
        </div>

                    <button type="submit" class="btn btn-gradient-primary me-2">{{__('admin.send')}}</button>
                    <a href="{{route('admin.flight_1.create')}}" class="btn btn-light">{{__('admin.cancel')}}</a>
                </form>
            </div>
        </div>
    </div>


  @endsection

<!--  {{__('admin.')}}  -->
