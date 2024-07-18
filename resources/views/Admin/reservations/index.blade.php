@extends('admin.layout.master')
@section('content')

<h1></h1>

    <div class="page-header">
        <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-airplane-takeoff"></i>
                </span> {{__('admin.reservation_list')}}
        </h3>
        <div>

        </div>
       @if(Session::has('success'))
           <p>{{Session::get('success')}}</p>
           @endif

    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"> {{__('admin.reservation')}} </h4>

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th> ID </th>

                            <th> {{__('admin.reservation_code')}} </th>

                            <th> {{__('admin.flight')}} </th>

                            <th> {{__('admin.user')}} </th>

                            <th> {{__('admin.passenger')}} </th>

                            <th> {{__('admin.reservation_date')}} </th>

                            <th> {{__('admin.seat_class')}} </th>

                            <th> {{__('admin.status')}} </th>

                            <th> {{__('admin.action')}} </th>

                        </tr>
                     </thead>
                        <tbody>
                        @foreach ($reservations as $reservation)
            <tr>
                <td>{{ $reservation->id }}</td>

                <td>{{ $reservation->reservation_code }}</td>

                <td> <a href="{{route('admin.flight_1.show', $reservation->flight->id)}}">   {{ $reservation->flight->flight_number  }}  </a></td>

                <td> {{ $reservation->user->name}}</td>

                <td>
                           <ul>
                                @foreach ($reservation->passengers as $passenger)
                                    <li>{{ $passenger->first_name}}</li>
                                @endforeach
                            </ul>
                </td>

                <td>{{ $reservation->reservation_date }}</td>

                <td>{{ $reservation->seat_class }}</td>

                <td>{{ $reservation->status }}</td>

<!-- <td>{{ optional($reservation->passenger)->first_name}}</td>  -->


                <td>
                <a href="{{ route('admin.reservation_1.show', $reservation->id) }}" class="btn btn-gradient-primary me-2">{{__('admin.View Details')}}</a>

                                <form method="post"  action="{{route('admin.reservation_1.destroy' , $reservation->id)}}" style="display: inline;">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-light" onclick="return confirm('Are you sure ')">  {{__('admin.Delete')}} </button>
                                </form>

                            </td>

            </tr>
            @endforeach
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

