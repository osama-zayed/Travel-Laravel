@extends('admin.layout.master')
@section('content')

<h1></h1>

    <div class="page-header">
        <h2 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-airplane-takeoff"></i>
                </span> {{__('admin.airports_list')}}
        </h2>
        <div>
            <a href="{{route('admin.airport_1.create')}}" class="btn btn-gradient-primary btn-rounded btn-fw">Add Airport</a>
        </div>
       @if(Session::has('success'))
           <p>{{Session::get('success')}}</p>
           @endif

    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{__('admin.Airport')}}</h4>

                    <table class="table table-striped">
                        <thead>
                          <tr>
                             <th> ID </th>
                             <th> {{__('admin.name')}} </th>
                             <th> {{__('admin.country')}} </th>
                             <th> {{__('admin.city')}} </th>
                             <th> {{__('admin.code')}} </th>
                             <th> {{__('admin.action')}}</th>
                         </tr>
                        </thead>
                        <tbody>

                          @foreach($airports as $airport)

                          <tr>
                               <td>   {{$airport->id}}       </td>

                               <td>  {{$airport->name}}   </td>

                               <td>  {{$airport->country}}   </td>

                               <td>  {{$airport->city}}   </td>

                               <td>  {{$airport->code}}   </td>

                               <td>
                               <a href="{{ route('admin.airport_1.show', $airport->id) }}" class="btn btn-gradient-primary me-2">{{__('admin.View Details')}}</a>

                               <a href="{{route('admin.airport_1.edit', $airport->id)}}" class="btn btn-gradient-primary me-2">  {{__('admin.Edit')}} </a>

                                  <form method="POST" action="{{route('admin.airport_1.destroy' , $airport->id)}}" style="display: inline;">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-light" onclick="return confirm('{{ __('admin.confirm_delete')}}')">  {{__('admin.Delete')}} </button>
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
