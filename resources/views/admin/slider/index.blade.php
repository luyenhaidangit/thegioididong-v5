@extends('admin.slider.layout')
@section('content')

    @foreach($sliders as $slider)
        <div class="modal fade" id="exampleModal{{$slider->slider_id}}" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Chi tiết slider hình ảnh
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                </thead>
                                <tbody>
                                <tr>
                                    <th>Hình ảnh : </th>
                                    <td><img src="http://127.0.0.1:8000/images/{{ $slider->image }}" width="500px" height="300px"/></td>
                                </tr>
                                <tr>
                                    <th style="width:200px">Tiêu đề nhỏ: </th>
                                    <td width="500px" style="white-space: normal">{{$slider->slider_small_title}}</td>
                                </tr>
                                <tr>
                                    <th>Tiêu đề lớn: </th>
                                    <td>{!! $slider->slider_big_title  !!}</td>
                                </tr>
                                <tr>
                                    <th>Highlight : </th>
                                    <td>{{$slider->highlight_text}}</td>
                                </tr>
                                <tr>
                                    <th>Mô tả: </th>
                                    <td>{!! $slider->slider_description !!}</td>
                                </tr>
                                <tr>
                                    <th>Link Button: </th>
                                    <td>{!! $slider->slider_link !!}</td>
                                </tr>
                                <tr>
                                    <th>Tiêu đề button: </th>
                                    <td>{!! $slider->slider_title_button !!}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
    @endforeach


    <table id="datatable" class="table table-bordered dt-responsive nowrap"
           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
        <thead>
        <th width="50%">Hình ảnh</th>
{{--        <th>Tiêu đề nhỏ</th>--}}
{{--        <th>Tiêu đề lớn</th>--}}
{{--        <th>Highlight</th>--}}
        <th>Trạng Thái</th>
        <th>Xem chi tiết</th>
        <th>Sửa</th>
        <th>Xóa</th>
        </thead>
        <tbody>
        @foreach($sliders as $slider)
            <tr>
                <td width="10%"><img src="http://127.0.0.1:8000/images/{{ $slider->image }}" width="300px" height="100px"/></td>
{{--                <td width="5%">{{$slider->slider_small_title}} </td>--}}
{{--                <td>{{$slider->slider_big_title}}</td>--}}
{{--                <td>{{$slider->highlight_text}}</td>--}}
                {{--                <td><a href="#" class="btn btn-outline-primary"><i class="fa fa-eye"></i></a>--}}
                {{--                    <a href="{{route('slider.edit', $slider->slider_id)}}" class="btn btn-primary"><i--}}
                {{--                                class="fa fa-edit"></i></a>--}}
                {{--                    <a href="" class="btn btn-warning"><i class="fa fa-lock"></i></a>--}}
                {{--                </td>--}}
                {{--                <td><a href="{{route('slider.edit', $slider->slider_id)}}" class="btn btn-primary"><i--}}
                {{--                                class="fa fa-edit"></i></a></td>--}}
                {{--                <td><a href="" class="btn btn-warning"><i class="fa fa-lock"></i></a></td>--}}
                <td>
                    @if($slider->status==1)
                        <a href="{{route('slider.changestatus',$slider->slider_id)}}" class="btn btn-success"><i
                                    class="fa fa-unlock"></i></a>
                    @else
                        <a href="{{route('slider.changestatus',$slider->slider_id)}}" class="btn btn-warning"> <i
                                    class="fa fa-lock"></i></a>
                    @endif
                </td>
                <td>
                    <button class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal{{$slider->slider_id}}"><i class="fa fa-eye"></i></button>
                </td>
                <td><a href="{{route('slider.edit', $slider->slider_id)}}" class="btn btn-primary"><i
                                class="fa fa-edit"></i></a></td>
                <td>
                    <form action="{{route('slider.destroy', $slider->slider_id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{----}}
@stop
