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
    <form action="{{route('product.update', $product->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="idcat">Danh mục:</label>
            <select name="idcat" class="form-control">
                @foreach ($categorys as $cate)
                    @if($cate->category_id==$product->idcat)
                    <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                    @endif
                @endforeach
                    @foreach ($categorys as $cate)
                        @if($cate->category_id!=$product->idcat)
                            <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                        @endif
                    @endforeach

            </select>
        </div>
        <div class="form-group">
            <label for="brand_id">Thương hiệu:</label>
            <select name="brand_id" class="form-control">
                    @foreach ($brands as $bra)
                        @if($bra->brand_id==$product->brand_id)
                            <option value="{{$bra->brand_id}}">{{$bra->brand_name}}</option>
                        @endif
                    @endforeach
                    @foreach ($brands as $bra)
                        @if($bra->brand_id!=$product->brand_id)
                            <option value="{{$bra->brand_id}}">{{$bra->brand_name}}</option>
                        @endif
                    @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name">Tên sản phẩm:</label>
            <input type="text" class="form-control" name="name" value="{{$product->name}}" required="required">
        </div>
        <div class="form-group">
            <label for="image">Hình ảnh sản phẩm:</label>
            <input type="file" class="form-control" name="image" value="{{$product->image}}"/>
            @error('image')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">

            <input type="text" class="form-control" name="product_image" value="{{$product->image}}" hidden>
        </div>
        <div class="form-group">
            <label for="price">Đơn giá:</label>
            <input type="text" class="form-control" name="price" value="{{$product->price}}">
        </div>
        <div class="form-group">
            <label for="discount">Giảm giá:</label>
            <input type="text" class="form-control" name="discount" value="{{$product->discount}}">
        </div>
        <div class="form-group">
            <label for="content">Nội dung:</label>
            <textarea class="form-control" name="product_content" id="contents">{{$product->content}}</textarea>
        </div>

        <div class="form-group">
            <label for="describe">Mô tả:</label>
            <textarea class="form-control" name="describe" id="describe">{{$product->describe}}</textarea>
        </div>
        <div class="form-group">
            <label for="keywords">Keywords:</label>
            <input type="text" class="form-control" name="keywords" value="{{$product->keywords}}">
        </div>
        <div class="form-group">
            <label for="link">Link videos:</label>
            <input type="text" class="form-control" name="link" value="{{$product->link}}">
        </div>
        <div class="form-group">
            <label for="view_number">Lượt xem:</label>
            <input type="text" class="form-control" name="view_number" value="{{$product->view_number}}">
        </div>
        <div class="form-group">
            <label for="qty_inventory">Số lượng tồn:</label>
            <input type="text" class="form-control" name="qty_inventory" value="{{$product->qty_inventory}}">
        </div>
        <div class="form-group">
            <label for="status">Tình trạng sản phẩm:</label>
            <select name="status" class="form-control" id="status">
                @if($product->status==1)
                    <option value='1'>Sản phẩm mới</option>
                    <option value='0'>Ẩn</option>
                    <option value='2'>Sản phẩm nổi bậc</option>
                    <option value='3'>Sản phẩm Big sale</option>
                @elseif($product->status==2)
                    <option value='2'>Sản phẩm nổi bậc</option>
                    <option value='1'>Sản phẩm mới</option>
                    <option value='0'>Ẩn</option>
                    <option value='3'>Sản phẩm Big sale</option>
                @elseif($product->status==3)
                    <option value='3'>Sản phẩm Big sale</option>
                    <option value='1'>Sản phẩm mới</option>
                    <option value='0'>Ẩn</option>
                    <option value='2'>Sản phẩm nổi bậc</option>
                @else
                    <option value='0'>Ẩn</option>
                    <option value='1'>Sản phẩm mới</option>
                    <option value='2'>Sản phẩm nổi bậc</option>
                    <option value='3'>Sản phẩm Big sale</option>
                @endif
            </select>
        </div>

        <button type="submit" name="btn_editor's" class="btn btn-primary">Thực Hiện</button>
    </form>
    </div>
@stop
