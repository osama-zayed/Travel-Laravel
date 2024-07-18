@extends('admin.layout.master')
@section('content')
<h1></h1>

<div class="page-header">
        <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-airplane-takeoff"></i>
                </span> {{__('admin.Route')}}
        </h3>
        <div>
            <a href="{{route('admin.route_1.index')}}" class="btn btn-gradient-primary btn-rounded btn-fw">Back</a>
        </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">{{__('admin.editRoute')}}</h3>
                <form method="post" action="{{route('admin.route_1.update', $route->id)}}" class="forms-sample" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')


                    <div class="form-group">
                        <label for="departure_airport_id" class="col-sm-3 col-form-label">{{__('admin.departure')}}</label>
                       <select class="form-control" name="departure_airport_id" id="departure_airport_id" value="{{ $route->departure_airport_id }}" placeholder="{{__('admin.departure Airport')}}">
                       <option value="">اختر مدينة الذهاب</option>
                       @foreach ($airports as $airport)
                          <option  value="{{ $airport->id }}">{{ $airport->city }}</option>
                                     @endforeach
                       </select>
                       @error('departure_airport_id')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="arrival_airport_id" class="col-sm-3 col-form-label">{{__('admin.arrival')}}</label>
                       <select class="form-control" name="arrival_airport_id" >
                       <option value="arrival_airport_id">اختر مدينة الوصول</option>
                                @foreach ($airports as $airport)
                          <option value="{{ $airport->id }}">{{ $airport->city }}</option>
                                     @endforeach
                       </select>
                       @error('arrival_airport_id')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="distance"class="col-sm-3 col-form-label">{{__('admin.distance (km)')}} </label>
                        <input type="text" class="form-control" name="distance" value="{{ $route->distance }}"  placeholder="{{__('admin.distance')}}" rows="4">
                        @error('distance')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="duration"class="col-sm-3 col-form-label">{{__('admin.duration')}}</label>
                        <input type="time" class="form-control" name="duration" value="{{ $route->duration }}"  placeholder="{{__('admin.duration')}}" rows="4">
                        @error('duration')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-gradient-primary me-2">{{__('admin.Update')}}</button>

                    <a href="{{route('admin.route_1.create')}}" class="btn btn-light">{{__('admin.cancel')}}</a>
                    </form>
                  </div>
                </div>
              </div>

@endsection

<!--  {{__('admin.')}}  -->
