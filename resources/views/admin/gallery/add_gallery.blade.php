@extends('admin.gallery.layout')
@section('content')
    <form action="{{route('insert-gallery',$pro_id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-2" align="right">

            </div>
            <div class="col-md-6" style="margin-bottom: 5px;">
                <input type="file" class="form-control" name="files[]" id="file" accept="image/*" multiple>
                <span id="error_gallery"></span>
            </div>
            <div class="col-md-2" style="text-align: center">
{{--                <input type="submit " class="btn btn-primary" name="upload" name="taianh" value="Tải ảnh">--}}
                <button class="btn btn-primary" name="btn_product" type="submit">Thực Hiện</button>
            </div>

        </div>
        <?php
        $message=Session::get('message');
        if($message)
        {
            echo '<span class="text-alert">'.$message.'</span>';
        }
        ?>
    </form>
    <br>
    <br>
    <div class="panel-body">
        <input type="hidden" value="{{$pro_id}}" name="pro_id" class="pro_id">
    <form>
        @csrf
        <div id="gallery_load">

        </div>
    </form>
    </div>
@stop
