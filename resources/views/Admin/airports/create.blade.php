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
                <h3 class="card-title">{{__('admin.createAirport')}}</h3>
                <p class="card-description">  Airport </p>
                <form method="post" action="{{route('admin.airport_1.store')}}" class="forms-sample" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="col-sm-3 col-form-label">{{__('admin.name')}}  </label>
                        <input type="text" class="form-control" name="name" placeholder="{{__('admin.name')}}">
                        @error('name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>


                    <div class="form-group">
                     <label for="country" class="col-sm-3 col-form-label">{{ __('admin.country') }}  :</label>
                         <select name="country" id="country" class="form-control">
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
                           <label for="city" class="col-sm-3 col-form-label">{{ __('admin.city') }}  :</label>
                            <select name="city" id="city" class="form-control">
                             <option value="">{{ __('admin.select_city') }}</option>
                             </select>
                             @error('city')
                                   <span class="text-danger">{{$message}}</span>
                              @enderror
                                  </div>

                    <div class="form-group">
                        <label for="code"class="col-sm-3 col-form-label">{{__('admin.code')}}</label>
                        <input type="text" class="form-control" name="code" id="code"  placeholder="{{__('admin.code')}}">
                        @error('code')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>


                    <button type="submit" class="btn btn-gradient-primary me-2">{{__('admin.send')}}</button>
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
