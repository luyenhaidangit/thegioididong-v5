@extends('admin.delivery.layout')
@section('content')
    <form style="margin: 0px 200px;" >
        @csrf
        <div class="form-group">
            <label for="city">Chọn thành phố:</label>
            <select name="city" id="city" class="form-control choose city">
                <option value=''>---Vui lòng chọn thành phố---</option>
                @foreach($city as $key=>$ci)
                    <option value='{{$ci->matp}}'>{{$ci->name_city}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="province">Chọn quận huyện:</label>
            <select name="province" id="province" class="form-control province choose">
                <option value=''>---Vui lòng chọn quận huyện---</option>
            </select>
        </div>
        <div class="form-group">
            <label for="wards">Chọn xã phường:</label>
            <select name="wards" id="wards" class="form-control wards">
                <option value=''>---Vui lòng chọn xã phường---</option>
            </select>
        </div>
        <div class="form-group">
            <label for="fee_ship">Phí vận chuyển:</label>
            <input type="text" class="form-control fee_ship" name="fee_ship" id="fee_ship">
        </div>

        <button type="button" class="btn btn-primary add_delivery" name="add_delivery">Thêm phí vận chuyển</button>
    </form>

    </div>
    <div id="load_delivery"></div>
@stop

