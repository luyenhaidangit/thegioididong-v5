
<div class="modal fade" id="exampleModal{{$order->order_id}}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document" style="width: 30%">
        <div class="modal-content">
            <h4 style="text-align: center;font-weight: 900;">THÔNG TIN HÓA ĐƠN #HDBH{{$order->order_id}}</h4>
            <form action="" method="POST" enctype="multipart/form-data" style="padding: 20px">
                @csrf
                @method('PUT')
                <input type="text" class="form-control" name="product_id" value="" hidden>
                <div class="form-group">
                    <label for="import_qty" style="padding: 0px">Số lượng nhập:</label>
                    <input type="text" class="form-control" name="import_qty" value="">
                </div>
                <div class="form-group">
                    <label for="import_price" style="padding: 0px">Đơn giá nhập:</label>
                    <input type="text" class="form-control" name="import_price" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Trạng thái</label>
                    <select name="status" class="form-control input-sm m-bot15">
                        @if(1==1)
                            <option value="1">Hiển Thị</option>
                            <option value="0">Ẩn</option>
                        @elseif(1==0)
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

