<div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('customer.create-profiles')}}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="row gutters">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="image" style="font-weight: 600;">Ảnh đại
                                    diện:</label>
                                <input hidden type="text" name="acc_image"
                                       value="{{$accountcustomer->image}}">
                                <input type="file" class="image" id="image" name="image"
                                       style="display: block;padding: 8px 15px;color: #373d54;width: 100%;background: #f8fafc;font-size: 14px;height: 40px;border: 1px solid #e0e4f6;transition: all 0.2s;">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="fullName" style="font-weight: 600;">Họ và
                                    tên:</label>
                                <input type="text" class="fullname" id="fullName" name="name"
                                       placeholder="Nhập họ vào tên"
                                       style="display: block;padding: 0 15px;color: #373d54;width: 100%;background: #f8fafc;font-size: 14px;height: 40px;border: 1px solid #e0e4f6;transition: all 0.2s;"
                                       value="{{$accountcustomer->name}}" required>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="eMail" style="font-weight: 600;">Email:</label>
                                <input type="email" class="email" id="eMail" name="email"
                                       placeholder="Nhập email"
                                       style="display: block;padding: 0 15px;color: #373d54;width: 100%;background: #f8fafc;font-size: 14px;height: 40px;border: 1px solid #e0e4f6;transition: all 0.2s;"
                                       value="{{$accountcustomer->email}}" required>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="phone" style="font-weight: 600;">Số điện
                                    thoại:</label>
                                <input type="text" class="phone" id="Iphone" name="phone"
                                       placeholder="Nhập số điện thoại"
                                       style="display: block;padding: 0 15px;color: #373d54;width: 100%;background: #f8fafc;font-size: 14px;height: 40px;border: 1px solid #e0e4f6;transition: all 0.2s;"
                                       value="{{$accountcustomer->phone}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row gutters">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="Street" style="font-weight: 600;">Tỉnh/thành
                                    phố:</label>
                                <select name="city" id="city" class="choose city"
                                        style="width: 100%;display: block;padding: 0 15px;color: #373d54;  background: #f8fafc;font-size: 14px;height: 40px;border: 1px solid #e0e4f6;transition: all 0.2s;"
                                        required>
                                    <option
                                        value="{{$accountcustomer->city}}">{{$name_city}}</option>
                                    @foreach($city as $key=>$ci)
                                        <option
                                            value='{{$ci->matp}}'>{{$ci->name_city}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="ciTy" style="font-weight: 600;">Quận/huyện:</label>
                                <select name="province" id="province" class="province choose"
                                        style="width: 100%;display: block;padding: 0 15px;color: #373d54;  background: #f8fafc;font-size: 14px;height: 40px;border: 1px solid #e0e4f6;transition: all 0.2s;"
                                        required>
                                    <option
                                        value="{{$accountcustomer->province}}">{{$name_province}}</option>
                                    @if($province!=null)
                                        @foreach($province as $key=>$prov)
                                            <option
                                                value='{{$prov->maqh}}'>{{$prov->name_quanhuyen}}</option>
                                        @endforeach
                                    @else
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="sTate" style="font-weight: 600;">Xã/phường:</label>
                                <select name="wards" id="wards" class="wards"
                                        style="width: 100%;display: block;padding: 0 15px;color: #373d54;  background: #f8fafc;font-size: 14px;height: 40px;border: 1px solid #e0e4f6;transition: all 0.2s;"
                                        required>
                                    <option
                                        value="{{$accountcustomer->wards}}">{{$name_wards}}</option>
                                    @if($wards!=null)
                                        @foreach($wards as $key=>$wa)
                                            <option
                                                value='{{$wa->xaid}}'>{{$wa->name_xaphuong}}</option>
                                        @endforeach
                                    @else
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="address" style="font-weight: 600;">Địa chỉ cụ
                                    thể:</label>
                                <input type="text" class="bigaddress" id="zIp" name="address"
                                       placeholder="Số nhà.."
                                       style="width: 100%;display: block;padding: 0 15px;color: #373d54;  background: #f8fafc;font-size: 14px;height: 40px;border: 1px solid #e0e4f6;transition: all 0.2s;"
                                       value="{{$accountcustomer->address}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="text-right">
                                <input type="submit" value="Cập Nhật" style="padding: 10px 20px;background: #449d44;border: none;border-radius: 3px; color: white;">
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

</div>
