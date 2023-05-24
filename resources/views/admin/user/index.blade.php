@extends('admin.user.layout')
@section('content')
    @foreach($users as $user)
        <div class="modal fade" id="exampleModal{{$user->id}}" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                           Chi tiết tài khoản
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
                                    <th style="width: 200px">Tên Tài Khoản: </th>
                                    <td>{{$user->name}}</td>
                                </tr>
                                <tr>
                                    <th>Hình ảnh : </th>
                                    <td><img src="{{asset('images/'. $user->image)}}" width="200px" height="180px"/></td>
                                </tr>
                                <tr>
                                    <th>Email : </th>
                                    <td>{{$user->email}}</td>
                                </tr>
                                <tr>
                                    <th>Công việc: </th>
                                    <td>{{$user->title}}</td>
                                </tr>
                                <tr>
                                    <th>Mô tả : </th>
                                    <td>{!! $user->description  !!}</td>
                                </tr>
                                <tr>
                                    <th>Số điện thoại : </th>
                                    <td>{{$user->phone}}</td>
                                </tr>
                                <tr>
                                    <th>Địa chỉ : </th>
                                    <td>{{$user->address}}</td>
                                </tr>
                                <tr>
                                    <th>Liên hệ : </th>
                                    <td>{{$user->contact}}</td>
                                </tr>
                                <tr>
                                    <th>Trạng thái : </th>
                                    @if($user->status == '1')
                                        <td>Tài khoản được hoạt động </td>
                                    @else
                                        <td>Tài khoản đã bị khóa</td>
                                    @endif
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
        <th>Hình ảnh</th>
        <th>Tên</th>
        <th>Email</th>
        <th>Trạng Thái</th>
        <th>Xem chi tiết</th>
        <th>Sửa</th>
        <th>Xóa</th>
        </thead>
        <tbody>
        @foreach($users ?? '' as $user)
            <tr>
                <td width="5%"><img src="{{asset('images/'. $user->image)}}" width="100px" height="70px"/></td>
                <td>{{$user->name}} </td>
                <td>{{$user->email}} </td>
                {{--                <td>{{$user->password}} </td>--}}
                {{--                <td>{{$user->title}} </td>--}}
                <td>
                    @if($user->status == 1)
                        <a href="{{route('user.changestatus',$user->id)}}" class="btn btn-success"><i
                                    class="fa fa-unlock"></i></a>
                    @else
                        <a href="{{route('user.changestatus',$user->id)}}" class="btn btn-warning"> <i
                                    class="fa fa-lock"></i></a>
                    @endif

                </td>
                <td>
                    <button class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal{{$user->id}}"><i class="fa fa-eye"></i></button>
                </td>
                <td><a href="{{route('user.getedit',$user->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                </td>
                <td><a href="{{route('user.delete',$user->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                </td>


            </tr>
        @endforeach
        </tbody>
    </table>

@stop
