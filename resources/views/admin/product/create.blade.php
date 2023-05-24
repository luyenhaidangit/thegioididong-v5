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
    <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {{ csrf_field() }}
        <div class="form-group">
            <label for="idcat">Danh Mục:</label>
            <select name="idcat" class="form-control">
                <option value=''>---Vui lòng chọn danh mục sản phẩm---</option>
                @foreach ($categorys as $key =>$cat)
                    <option value="{{$cat->category_id}}">{{($key+1).'. '.$cat->category_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="brand_id">Thương hiệu:</label>
            <select name="brand_id" class="form-control">
                <option value=''>---Vui lòng chọn Thương hiệu sản phẩm---</option>
                >
                @foreach ($brands as $key =>$bra)
                    <option value="{{$bra->brand_id}}">{{($key+1).'. '.$bra->brand_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name">Tên sản phẩm:</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group">
            <label for="image">Hình ảnh sản phẩm:</label>
            <input type="file" class="form-control" name="image" value=""/>
        </div>
        <div class="form-group">
            <label for="image">Thư viện ảnh:</label>
            <input type="file" class="form-control" id="file" name="files[]" accept="image/*" multiple>
            <span id="error_gallery"></span>
        </div>

        <div class="form-group">
            <label for="import_price">Đơn giá nhập:</label>
            <input type="text" class="form-control" name="import_price">
        </div>
        <div class="form-group">
            <label for="import_qty">Số lượng nhập:</label>
            <input type="text" class="form-control" name="import_qty">
        </div>
        <div class="form-group">
            <label for="price">Đơn giá bán:</label>
            <input type="text" class="form-control" name="price">
        </div>
        <div class="form-group">
            <label for="discount">Giảm giá:</label>
            <input type="text" class="form-control" name="discount">
        </div>
        <div class="form-group">
            <label for="content">Nội Dung:</label>
            <textarea class="form-control" name="product_content" id="contents"></textarea>
        </div>
        <div class="form-group">
            <label for="describe">Mô tả:</label>
            <textarea class="form-control" name="describe" id="describe"></textarea>
        </div>
        <div class="form-group">
            <label for="keywords">Keywords:</label>
            <input type="text" class="form-control" name="keywords">
        </div>
        <div class="form-group">
            <label for="link">link videos:</label>
            <input type="text" class="form-control" name="link">
        </div>
        <div class="form-group">
            <label for="status">Tình trạng sản phẩm:</label>
            <select name="status" class="form-control" id="status">
                <option value='1'>Sản phẩm mới</option>
                <option value='0'>Hết hàng</option>
                <option value='2'>Sản phẩm nổi bậc</option>
                <option value='3'>Sản phẩm Big sale</option>
            </select>
        </div>
        <button class="btn btn-primary" name="btn_product" type="submit">Thực Hiện</button>
    </form>
    </div>
@stop
