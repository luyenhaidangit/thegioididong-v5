@extends('admin.customer.layout')
@section('content')
    @if (session('message'))
        <div class="alert alert-success">
            <p>{{ session('message') }}</p>
        </div>
    @endif
<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
  <thead>
    <th>Tên khách hàng</th>
    <th>Email</th>
    <th>Số điện thoại</th>
{{--    <th>Sửa</th>--}}
    <th>Khóa</th>
  </thead>
  <tbody>
    @foreach($customers as $customer)
        <tr>
            <td>{{$customer->name}} </td>
            <td>{{$customer->email}} </td>
            <td>{{$customer->phone}} </td>
{{--             <td><a href="{{route('customer.edit', $customer->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a></td>--}}
             <td>
{{--               <form action="{{route('customer.destroy', $customer->id)}}" method="POST">--}}
{{--               @csrf--}}
{{--               @method('DELETE')--}}
{{--               <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>--}}
{{--               </form>--}}
                 @if($customer->status==1)
                     <a href="{{route('customer.changestatuslock',$customer->id)}}" class="btn btn-success"><i
                             class="fa fa-unlock"></i></a>
                 @else
                     <a href="{{route('customer.changestatusunlock',$customer->id)}}" class="btn btn-warning"> <i
                             class="fa fa-lock"></i></a>
                 @endif
             </td>
        </tr>

        @endforeach
    </tbody>
</table>

@stop
