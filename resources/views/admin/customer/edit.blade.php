@extends('admin.customer.layout')
@section('content')
<form action="{{route('customer.update', $customer->customer_id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
     <label for="name">Tên:</label>
     <input type="text" class="form-control" name="customer_name" value="{{$customer->customer_name}}">
   </div>
   <div class="form-group">
    <label for="price">Email:</label>
    <input type="text" class="form-control"name="customer_email" value="{{$customer->customer_email}}">
  </div>
  <div class="form-group">
    <label for="discount">Địa chỉ:</label>
    <input type="text" class="form-control"name="customer_address" value="{{$customer->customer_address}}">
  </div>
  <div class="form-group">
    <label for="discount">Số điện thoại:</label>
    <input type="text" class="form-control"name="customer_phone_number" value="{{$customer->customer_phone_number}}">
  </div>
  <div class="form-group">
    <label for="discount">Ghi chú:</label>
    <input type="text" class="form-control"name="customer_note" value="{{$customer->customer_note}}">
  </div>
   <button type="submit" name="btn_editproduct"class="btn btn-primary">Thực Hiện</button>
 </form>
 </div>
 @stop
