@extends('admin.product.layout')
@section('content')
    @if (session('message'))
        <div class="alert alert-success">
            <p>{{ session('message') }}</p>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            <p>{{ session('error') }}</p>
        </div>
    @endif

    @foreach($products as $product)
        <div class="modal fade" id="exampleModal{{$product->id}}" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Chi tiết sản phẩm
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
                                    <th style="width: 200px">Tên Sản Phẩm: </th>
                                    <td>{{$product->name}}</td>
                                </tr>
                                <tr>
                                    <th>Hình ảnh : </th>
                                    <td>
                                        <img src="http://127.0.0.1:8000/images/{{ $product->image }}" alt="Product Image" width="200px" height="180px">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Giá : </th>
                                    <td>{{number_format($product->price,'0',',','.')}} VNĐ</td>
                                </tr>
                                <tr>
                                    <th>Giảm giá </th>
                                    <td>{{number_format($product->discount,'0',',','.')}} VNĐ</td>
                                </tr>
                                <tr>
                                    <th>Lượt xem : </th>
                                    <td>{{$product->view_number}}</td>
                                </tr>
                                <tr>
                                    <th>Số lượng tồn : </th>
                                    <td>{{$product->qty_inventory}}</td>
                                </tr>
                                <tr>
                                    <th>Trạng thái : </th>
                                    @if($product->status==0)
                                        <td>Hết hàng</td>
                                    @elseif($product->status==1)
                                        <td>Mới</td>
                                    @elseif($product->status==2)
                                        <td>Nổi bậc</td>
                                    @else
                                        <td>Big Sale</td>
                                    @endif
                                </tr>

                                <tr>
                                    <th>Link video : </th>
                                    <td>{{$product->link}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                    </div>

                </div>
            </div>
        </div>
    @endforeach
    @foreach($products as $product)
    @include('admin.product.model_import')
    @endforeach
    <div style="padding: 20px;border: 1px solid #eaeaea;">
    <table id="datatable" class="table table-bordered dt-responsive nowrap"
           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
        <thead>
        <th>Hình ảnh</th>
        <th>Tên</th>
        <th>Thư viện ảnh</th>
        <th>Giá</th>
        <th>SL tồn</th>

        <th>Xem chi tiết</th>
        <th>Nhập</th>
        <th>sửa</th>
        <th>Xóa</th>

        </thead>
        <tbody>
        @foreach($products ?? '' as $product)
            <tr>
                <td><img src="{{asset('/images/'. $product->image)}}" width="40"/></td>
                <td width="400px" style="white-space: normal">{{$product->name}} </td>
                <td><a href="{{route('add-gallery', $product->id)}}" class="btn btn-outline-primary"><i class="fas fa-image" aria-hidden="true"></i></a></td>
                <td>{{number_format($product->price - $product->discount,'0',',','.')}} </td>
                <td>{{$product->qty_inventory}}</td>
                <td>
                    <button class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal{{$product->id}}"><i class="fa fa-eye"></i></button>
                </td>
                <td>
                    <button class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal{{$product->id+10000}}"><i class="fa fa-file-import"></i></button>
                </td>
                <td><a href="{{route('product.edit', $product->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                </td>
                <td>
                    @if($product->status <> 0)
                        <a href="{{route('product.changestatus',$product->id)}}" class="btn btn-danger"><i
                                class="fa fa-trash"></i></a>
                    @else
                        <a href="{{route('product.changestatus',$product->id)}}" class="btn btn-danger"> <i
                                class="fa fa-trash"></i></a>
                    @endif
                </td>
{{--                <td>--}}
{{--                    <form action="{{route('product.destroy', $product->id)}}" method="POST">--}}
{{--                        @csrf--}}
{{--                        @method('DELETE')--}}
{{--                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>--}}

{{--                    </form>--}}
{{--                </td>--}}
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
@stop
