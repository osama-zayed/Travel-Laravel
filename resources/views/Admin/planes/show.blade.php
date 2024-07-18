

@extends('admin.layout.master')
@section('content')

<h1></h1>

    <div class="page-header">
        <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-airplane-takeoff"></i>
                </span><h2> {{__('admin.plane_details')}} </h2>
        </h3>
        <div>
            <a href="{{route('admin.plane_1.index')}}" class="btn btn-gradient-primary btn-rounded btn-fw">Back to Index </a>
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

                        <p><strong> ID : </strong> {{ $plane->id }}</p>
    <p><strong>{{__('admin.name')}} : </strong> {{ $plane->name}}</p>
    <p><strong>{{__('admin.Plane')}} : </strong> {{ $plane->model}}</p>
    <p><strong>{{__('admin.airline')}}  : </strong> {{ $plane->airline}}</p>
    <p><strong>{{__('admin.first_class')}} : </strong>  {{$plane->first_class}}</p>
    <p><strong>{{__('admin.business_class')}} : </strong> {{ $plane->business_class}}</p>
    <p><strong>{{__('admin.economy_class')}} : </strong> {{ $plane->economy_class}}</p>
    <p><strong>{{__('admin.type')}}  : </strong> {{ $plane->type}}</p>
    <p><strong>{{__('admin.status')}}  : </strong> {{ $plane->status}}</p>
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

