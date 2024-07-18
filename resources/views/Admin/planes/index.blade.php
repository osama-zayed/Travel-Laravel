@extends('admin.layout.master')
@section('content')

<h1></h1>

    <div class="page-header">
        <h2 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-airplane"></i>
                </span> {{__('admin.Planes')}}
        </h2>
        <div>
            <a href="{{route('admin.plane_1.create')}}" class="btn btn-gradient-primary btn-rounded btn-fw">Add Plane</a>
        </div>
       @if(Session::has('success'))
           <p>{{Session::get('success')}}</p>
           @endif

    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">{{__('admin.Plane')}}</h3>

                    <table class="table table-striped">
                        <thead>
                          <tr>
                             <th> ID </th>
                             <th> {{__('admin.name')}} </th>
                             <th> {{__('admin.model')}} </th>
                             <th> {{__('admin.airline')}} </th>
                             <th> {{__('admin.first_class')}} </th>
                             <th> {{__('admin.business_class')}} </th>
                             <th> {{__('admin.economy_class')}} </th>
                             <th> {{__('admin.type')}} </th>
                             <th> {{__('admin.status')}} </th>
                             <th> {{__('admin.action')}}</th>
                         </tr>
                        </thead>
                        <tbody>

                          @foreach($planes as $plane)

                          <tr>
                               <td>   {{$plane->id}}       </td>

                               <td>  {{$plane->name}}   </td>

                               <td>  {{$plane->model}}   </td>

                               <td>  {{$plane->airline}}   </td>

                               <td>  {{$plane->first_class}}   </td>

                               <td>  {{$plane->business_class}}   </td>

                               <td>  {{$plane->economy_class}}   </td>

                               <td>  {{$plane->type== 'active' ? ' إيجار' : ' ملك' }}  </td>

                               <td>{{ $plane->status == 'active' ? 'قيد العمل' : 'خارج الخدمة' }}</td>


                             <td>

                             <a href="{{ route('admin.plane_1.show', $plane->id) }}" class="btn btn-gradient-primary me-2">{{__('admin.View Details')}}</a>

                             <a href="{{ route('admin.plane_1.edit', $plane->id) }}" class="btn btn-gradient-primary me-2"> {{__('admin.Edit')}} </a>

                             <form action="{{ route('admin.plane_1.destroy', $plane->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-light" onclick="return confirm('Are you sure')">  {{__('admin.Delete')}}</button>
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
