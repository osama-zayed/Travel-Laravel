@extends('admin.layout.master')
@section('content')

<h1></h1>

    <div class="page-header">
        <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> {{__('admin.News')}}
        </h3>
        <div>
            <a href="{{route('admin.news_1.create')}}" class="btn btn-gradient-primary btn-rounded btn-fw">Add News</a>
        </div>
       @if(Session::has('success'))
           <p>{{Session::get('success')}}</p>
           @endif

    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{__('admin.News')}}</h4>

                    <table class="table table-striped">
                        <thead>
                          <tr>
                             <th> ID </th>
                             <th> {{__('admin.address')}} </th>
                             <th> {{__('admin.content')}} </th>
                             <th> {{__('admin.image')}} </th>
                             <th> {{__('admin.action')}} </th>
                         </tr>
                        </thead>
                        <tbody>

                          @foreach($news as $news)

                          <tr>
                               <td>   {{$news->id}}       </td>

                               <td>  {{$news->address}}   </td>

                               <td>  {{$news->content}}   </td>


                              <td class="py-1"> <img src="{{asset('storage/'.$news->image )}}"> </td>
                             <td>


                                  <a href="{{route('admin.news_1.edit', $news->id)}}" class="btn btn-gradient-primary me-2">  {{__('admin.Edit')}} </a>

                                  <form method="POST" action="{{route('admin.news_1.destroy' , $news->id)}}" style="display: inline;">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-light" onclick="return confirm('Are you sure ')">  {{__('admin.Delete')}} </button>
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
