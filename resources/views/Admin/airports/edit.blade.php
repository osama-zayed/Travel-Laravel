@extends('admin.layout.master')
@section('content')
<h1></h1>

<div class="page-header">
        <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-airplane-takeoff"></i>
                </span> {{__('admin.Airport')}}
        </h3>
        <div>
            <a href="{{route('admin.airport_1.index')}}" class="btn btn-gradient-primary btn-rounded btn-fw">Back</a>
        </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{__('admin.editAirport')}}</h4>
                <form method="post" action="{{route('admin.airport_1.update', $airport->id)}}" class="forms-sample" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">{{__('admin.name')}}</label>
                        <input type="text" class="form-control" name="name" value="{{ $airport->name }}" placeholder="{{__('admin.name')}}">
                        @error('name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                     <label for="country">{{ __('admin.country') }}:</label>
                         <select  name="country"  id="country" class="form-control"  value="{{ $airport->country }}">
                                  <option value="">{{ __('admin.select_country') }}</option>
                                       @foreach($countries as $country)
                                  <option value="{{ $country }}">{{ $country }}</option>
                                       @endforeach
                           </select>
                           @error('country')
                             <span class="text-danger">{{$message}}</span>
                            @enderror
                          </div>

                    <div class="form-group">
                           <label for="city">{{ __('admin.city') }}:</label>
                            <select name="city" id="city" value="{{ $airport->city }}" class="form-control">
                             <option value="">{{ __('admin.select_city') }}</option>
                             </select>
                             @error('city')
                                   <span class="text-danger">{{$message}}</span>
                              @enderror
                                  </div>

                    <div class="form-group">
                        <label for="code">{{__('admin.code')}}</label>
                        <input type="text" class="form-control" name="code" rows="4" value="{{ $airport->code}}" placeholder="{{__('admin.code')}}">
                        @error('code')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>


                    <button type="submit" class="btn btn-gradient-primary me-2">{{__('admin.Update')}}</button>

                    <a href="{{route('admin.airport_1.create')}}" class="btn btn-light">{{__('admin.cancel')}}</a>
                </form>
            </div>
        </div>
    </div>


 <!-- استدعاء المدن الخاصة بالدولة المحددة -->

 <script>
    var cities = {!! json_encode($cities) !!};

    document.getElementById('country').addEventListener('change', function() {
        var country = this.value;
        var citiesSelect = document.getElementById('city');
        citiesSelect.innerHTML = ''; // clear previous options

        cities[country].forEach(function(city) {
            var option = document.createElement('option');
            option.value = city;
            option.textContent = city;
            citiesSelect.appendChild(option);
        });
    });
</script>

@endsection

<!--  {{__('admin.')}}  -->
