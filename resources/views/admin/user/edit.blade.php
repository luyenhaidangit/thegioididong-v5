@extends('admin.user.layout')
@section('content')   
         <form action="{{route('user.postedit',$user->id)}}" method="POST" enctype="multipart/form-data">
           {{ csrf_field() }}
          <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
          </div>
           <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}">
          </div>
          <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd" name="password" value="{{$user->password}}">
          </div>
             <div class="form-group">
                 <label for="title">Công việc:</label>
                 <textarea class="form-control" name="title">{{$user->title}}</textarea>
             </div>
             <div class="form-group">
                 <label for="description">Mô tả:</label>
                 <textarea class="form-control" id="contents"  name="description">{{$user->description}}</textarea>
                 <script>CKEDITOR.replace('contents');</script>
             </div>
             <div class="form-group">
                 <label for="image">Hình ảnh:</label>
                 <input type="file" class="form-control"name="image" value="" />
             </div>
             <div class="form-group">
                 <label for="phone">Phone:</label>
                 <input type="text" class="form-control"  name="phone" placeholder="số điện thoại" value="{{$user->phone}}">
             </div>
             <div class="form-group">
                 <label for="address">Địa chỉ:</label>
                 <input type="text" class="form-control"  name="address" placeholder="địa chỉ" value="{{$user->address}}">
             </div>
             <div class="form-group">
                 <label for="contact">Liên hệ:</label>
                 <input type="url" class="form-control"  name="contact" placeholder="liên hệ" value="{{$user->contact}}">
             </div>
             <div class="form-group">
                 <label for="exampleInputPassword1">Trạng thái</label>
                 <select name="status" class="form-control input-sm m-bot15">
                     <option value="1">Hiển thị </option>
                     <option value="0">Ẩn</option>
                 </select>
             </div>
          <button type="submit" name="btnregister"class="btn btn-primary">Thực Hiện</button>
        </form>
@stop