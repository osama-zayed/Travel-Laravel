@extends('admin.layout.master')
@section('content')

<h1></h1>

<div class="page-header">
        <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-airplane"></i>
                </span> {{__('admin.Planes')}}
        </h3>
        <div>
            <a href="{{route('admin.plane_1.index')}}" class="btn btn-gradient-primary btn-rounded btn-fw">Back</a>
        </div>
    </div>

    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">{{__('admin.editPlane')}}</h2>
                <p class="card-description"> Plane </p>
                <form method="post" action="{{route('admin.plane_1.update', $plane->id)}}" class="forms-sample" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name" class="col-sm-3 col-form-label">{{__('admin.name')}}  </label>
                        <input type="text" class="form-control" name="name" value="{{ $plane->name }}"  placeholder="{{__('admin.name')}}">
                        @error('name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="model" class="col-sm-3 col-form-label">{{__('admin.model')}}</label>
                          <input type="text" class="form-control"   id="model" name="model" value="{{ $plane->model}}"  placeholder="{{__('admin.model')}}">
                          @error('model')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>

                        <div class="form-group">
                        <label for="airline" class="col-sm-3 col-form-label">{{__('admin.airline')}}</label>
                          <input type="text" class="form-control"   id="airline" name="airline" value="{{ $plane->airline }}"  placeholder="{{__('admin.airline')}}">
                          @error('airline')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>

                        <div class="form-group">
                        <label for="first_class" class="col-sm-3 col-form-label">{{__('admin.first_class')}}</label>
                          <input type="number" class="form-control" id="first_class"  name="first_class" value="{{ $plane->first_class}}" placeholder="{{__('admin.first_class')}}">
                          @error('first_class')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>

                        <div class="form-group">
                        <label for="business_class" class="col-sm-3 col-form-label">{{__('admin.business_class')}}</label>
                          <input type="number" class="form-control" id="business_class"  name="business_class" value="{{ $plane->business_class }}"  placeholder="{{__('admin.business_class')}}">
                          @error('business_class')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>

                        <div class="form-group">
                        <label for="economy_class" class="col-sm-3 col-form-label">{{__('admin.economy_class')}}</label>
                          <input type="number" class="form-control" id="economy_class"  name="economy_class" value="{{ $plane->economy_class }}" placeholder="{{__('admin.economy_class')}}">
                          @error('economy_class')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>

                        <div class="form-group">
                        <label for="type" class="col-sm-3 col-form-label">{{__('admin.type')}}</label>
                     <!--   <input type="text" class="form-control"   id="status"  name="status" placeholder="{{__('admin.status')}}" >  -->
                     <select name="type" id="type" value="{{ $plane->type }}" class="form-control @error('type') is-invalid @enderror">
                                    <option value="active" {{ old('type') == 'active' ? 'selected' : '' }}>إيجار</option>
                                    <option value="out_of_service" {{ old('type') == 'out_of_service' ? 'selected' : '' }}>ملك</option>
                                </select>
                     @error('type')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>

                        <div class="form-group">
                        <label for="status" class="col-sm-3 col-form-label">{{__('admin.status')}}</label>
                     <!--   <input type="text" class="form-control"   id="status"  name="status" placeholder="{{__('admin.status')}}" >  -->
                     <select name="status" id="status" value="{{ $plane->status}}" class="form-control @error('status') is-invalid @enderror">
                                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>{{__('admin.active')}}</option>
                                    <option value="out_of_service" {{ old('status') == 'out_of_service' ? 'selected' : '' }}>{{__('admin.out_of_service')}}</option>
                                </select>
                     @error('status')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>



                    <button type="submit" class="btn btn-gradient-primary me-2">{{__('admin.Update')}}</button>
                    <a href="{{route('admin.plane_1.create')}}" class="btn btn-light">{{__('admin.cancel')}}</a>
                </form>
            </div>
        </div>
    </div>

  @endsection

<!--  {{__('admin.')}}  -->
