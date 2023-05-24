@extends('admin.logo.layout')
@section('content')
    @if (session('message'))
        <div class="alert alert-success">
            <p>{{ session('message') }}</p>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-4">
            @if($count_logo >0)
                <form action="{{route('logo.update', $logo->logo_id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                    @method('PUT')
                <div class="image-crop-preview clearfix">
                    <div class="img-container">
                        <img id="blah" src="{{asset('images/'. $logo->logo_image)}}"
                             alt="your image" style="width: 140px;height: 45px;"/>
                    </div>
                </div>
                <div class="form-group"
                     style="margin: 30px 0px">
                    <input style="border: none;padding: 10px 0px" type="file" onchange="readURL(this);" class="form-control" name="logo_image"
                           value="{{$logo->logo_image}}">
                    <input type="text" class="form-control" name="image"
                           value="{{$logo->logo_image}}" hidden>
                    <p style="font-weight: 900;">Width: 140 px - Height: 45 px (.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF)</p>
                </div>
                <div class="form-group" style="margin-bottom: 10px">
                    <label for="status">Trạng thái:</label>
                    <select name="logo_status" class="form-control" id="status">
                        @if($logo->logo_status==1)
                            <option value='1'>Hiển thị</option>
                            <option value='0'>Ẩn đi</option>
                        @else
                            <option value='0'>Ẩn đi</option>
                            <option value='1'>Hiển thị</option>
                        @endif
                    </select>
                </div>
                <div class="form-group" style="margin-bottom: 10px">
                    <button type="submit" name="btn_logo" class="btn btn-primary">Thực Hiện</button>
                    <button type="reset" class="btn btn-secondary waves-effect waves-light">
                        Cancel
                    </button>
                </div>
            </form>
            @else
                <form action="{{route('logo.store')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="image-crop-preview clearfix">
                        <div class="img-container">
                            <img id="blah" src="{{asset('admin\assets\images\logoll.png')}}"
                                 alt="your image" style="width: 140px;height: 45px;"/>
                        </div>
                    </div>
                    <div class="form-group"
                         style="margin: 30px 0px">
                        <input style="border: none;padding: 10px 0px" type="file" onchange="readURL(this);" class="form-control" name="logo_image"
                               value=""/>
                    </div>
                    <div class="form-group" style="margin-bottom: 10px">
                        <label for="status">Trạng thái:</label>
                        <select name="logo_status" class="form-control" id="status">
                                <option value='1'>Hiển thị</option>
                                <option value='0'>Ẩn đi</option>
                        </select>
                    </div>
                    <div class="form-group" style="margin-bottom: 10px">
                        <button type="submit" name="btn_logo" class="btn btn-primary">Thực Hiện</button>
                        <button type="reset" class="btn btn-secondary waves-effect waves-light">
                            Cancel
                        </button>
                    </div>
                </form>
            @endif
        </div>
    </div><!--end row-->
@stop

