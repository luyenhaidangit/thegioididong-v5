@extends('admin.brand.layout')
@section('content')
    <div style="padding: 20px;border: 1px solid #eaeaea;">
        <table id="datatable" class="table table-bordered dt-responsive nowrap"
               style="border-collapse: collapse; border-spacing: 0; width: 100%;">
              <thead>
              <th>Hình ảnh</th>
                <th>Tên</th>
                <th>Giá</th>
                <th>Giảm giá</th>
                <th>Sửa</th>

                <th>Xóa</th>
              </thead>
              <tbody>
                @foreach($products ?? '' as $product)
                  <tr>
                    <td><img src="{{asset('public/images/'. $product->image)}}" width="40" /></td>
                    <td>{{$product->name}} </td>
                    <td>{{$product->price}} </td>
                    <td>{{$product->discount}} </td>
                    <td><a href="{{route('product.edit', $product->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a></td>
                    <td><a href="{{route('product.changestatus',$product->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>

                  </tr>
                @endforeach
              </tbody>
          </table>
    </div>
@stop
