@foreach($import as $imp)
    <div class="modal fade" id="exampleModal{{$imp->import_id}}" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document" style="width: 30%">
            <div class="modal-content">
                <h4 style="text-align: center;font-weight: 900;">QUẢN LÝ NHẬP HÀNG</h4>
                <form action="{{route('import.update',$imp->import_id)}}" method="POST" enctype="multipart/form-data" style="padding: 20px">
                    @csrf
                    @method('PUT')
                    <input type="text" class="form-control" name="product_id" value="{{$imp->id}}" hidden>
                    <div class="form-group">
                        <label for="import_qty" style="padding: 0px">Số lượng nhập:</label>
                        <input type="text" class="form-control" name="import_qty" value="{{$imp->import_qty}}">
                    </div>
                    <div class="form-group">
                        <label for="import_price" style="padding: 0px">Đơn giá nhập:</label>
                        <input type="text" class="form-control" name="import_price" value="{{$imp->import_price}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Trạng thái</label>
                        <select name="status" class="form-control input-sm m-bot15">
                            @if($imp->import_status==1)
                                <option value="1">Hiển Thị</option>
                                <option value="0">Ẩn</option>
                            @elseif($imp->import_status==0)
                                <option value="0">Ẩn</option>
                                <option value="1">Hiển Thị</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                    <button type="submit" name="btn_import"class="btn btn-primary">Thực Hiện</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" style="float: right;">Đóng</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
