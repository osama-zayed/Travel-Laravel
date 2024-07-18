@extends('admin.layout.master')
@section('content')

<div class="page-header">
        <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> {{__('admin.News')}}
        </h3>
        <div>
            <a href="{{route('admin.news_1.index')}}" class="btn btn-gradient-primary btn-rounded btn-fw">Back</a>

        </div>
    </div>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{__('admin.createNews')}}</h4>
                <form method="post" action="{{route('admin.news_1.store')}}" class="forms-sample" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">{{__('admin.address')}}</label>
                        <input type="text" class="form-control" name="address" placeholder="{{__('admin.address')}}">
                        @error('address')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">{{__('admin.content')}}</label>
                        <textarea class="form-control" name="content"  placeholder="{{__('admin.content')}}"  rows="4"></textarea>
                        @error('content')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>{{__('admin.FileUpload')}}</label>
                        <input type="file" name="img" >
{{--                        <div class="input-group col-xs-12">--}}
{{--                            <input type="text" class="form-control file-upload-info" disabled placeholder="{{__('admin.FileUpload')}}">--}}
{{--                            <span class="input-group-append">--}}
{{--                            <button class="file-upload-browse btn btn-gradient-primary" type="button">{{__('admin.Upload')}}</button>--}}
{{--                          </span>--}}
{{--                        </div>--}}
                    </div>
                    @error('img')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <button type="submit" class="btn btn-gradient-primary me-2">{{__('admin.send')}}</button>
                    <a href="{{route('admin.news_1.create')}}"class="btn btn-light">{{__('admin.cancel')}}</a>
                </form>
            </div>
        </div>
    </div>


@endsection

<!--  {{__('admin.')}}  -->
