@extends('admin.profile.layout')
@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="profile-bg-picture" style="background-image:url({!!asset('admin/assets/images/bg-profile.jpg') !!}">
                    <span class="picture-bg-overlay"></span>
                    <!-- overlay -->
                </div>
                <!-- meta -->
                <div class="profile-user-box">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="profile-user-img"><img src="{{asset('images/'. Auth::User()->image)}}" alt="" class="avatar-lg rounded-circle"></div>
                            <div class="">
                                <h4 class="mt-5 font-18 ellipsis">{{Auth::User()->name}}</h4>
                                <p class="font-13">{!!Auth::User()->title !!}</p>

                            </div>
                        </div>
{{--                        <div class="col-sm-6">--}}
{{--                            <div class="text-right">--}}
{{--                                <a href="http://google.com">--}}
{{--                                <button type="button" class="btn btn-success waves-effect waves-light">--}}
{{--                                    <i class="mdi mdi-account-settings-variant mr-1"></i>  Edit Profile--}}
{{--                                </button>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </div>
                <!--/ meta -->
            </div>
        </div>
        <!-- end row -->

        <div class="row mt-4">
            <div class="col-sm-12">
                <div class="card p-0">
                    <div class="card-body p-0">
                        <ul class=" nav nav-tabs tabs-bordered nav-justified">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#aboutme">Thông tin</a></li>
{{--                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#user-activities">Activities</a></li>--}}
{{--                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#edit-profile">Settings</a></li>--}}
{{--                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#projects">Projects</a></li>--}}
                        </ul>

                        <div class="tab-content m-0 p-4">
                            <div id="aboutme" class="tab-pane active">
                                <div class="profile-desk">
                                    <h5 class="text-uppercase font-weight-bold">{{Auth::User()->name}}</h5>
                                    <div class="designation mb-4">{{Auth::User()->title}}</div>
                                    <p class="text-muted">
                                      {!! Auth::User()->description !!}
                                    </p>
                                    <a class="btn btn-primary mt-4" href="{{Auth::User()->contact}}"> <i class="fa fa-check"></i> Following</a>
                                    <h5 class="mt-4">Thông tin liên hệ</h5>
                                    <table class="table table-condensed mb-0">

                                        <tbody>
                                        <tr>
                                            <th scope="row">Facebook</th>
                                            <td>
                                                <a href="{{Auth::User()->contact}}" class="ng-binding">
                                                    {{Auth::User()->contact}}
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Email</th>
                                            <td>
                                                <a href="mailto: {{Auth::User()->email}}" class="ng-binding">
                                                    {{Auth::User()->email}}
                                                </a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row">Phone</th>
                                            <td class="ng-binding">{{Auth::User()->phone}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Address</th>
                                            <td>
                                                <a href="#" class="ng-binding">
                                                    {{Auth::User()->address}}
                                                </a>
                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div> <!-- end profile-desk -->
                            </div> <!-- about-me -->

                            <!-- Activities -->
{{--                            <div id="user-activities" class="tab-pane">--}}
{{--                                <div class="timeline-2">--}}
{{--                                    <div class="time-item">--}}
{{--                                        <div class="item-info ml-3 mb-3">--}}
{{--                                            <div class="text-muted">5 minutes ago</div>--}}
{{--                                            <p><strong><a href="#" class="text-info">John Doe</a></strong> Uploaded a photo <strong>"DSC000586.jpg"</strong></p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="time-item">--}}
{{--                                        <div class="item-info ml-3 mb-3">--}}
{{--                                            <div class="text-muted">30 minutes ago</div>--}}
{{--                                            <p><a href="" class="text-info">Lorem</a> commented your post.</p>--}}
{{--                                            <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="time-item">--}}
{{--                                        <div class="item-info ml-3 mb-3">--}}
{{--                                            <div class="text-muted">59 minutes ago</div>--}}
{{--                                            <p><a href="" class="text-info">Jessi</a> attended a meeting with<a href="#" class="text-success">John Doe</a>.</p>--}}
{{--                                            <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="time-item">--}}
{{--                                        <div class="item-info ml-3 mb-3">--}}
{{--                                            <div class="text-muted">5 minutes ago</div>--}}
{{--                                            <p><strong><a href="#" class="text-info">John Doe</a></strong>Uploaded 2 new photos</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="time-item">--}}
{{--                                        <div class="item-info ml-3 mb-3">--}}
{{--                                            <div class="text-muted">30 minutes ago</div>--}}
{{--                                            <p><a href="" class="text-info">Lorem</a> commented your post.</p>--}}
{{--                                            <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="time-item">--}}
{{--                                        <div class="item-info ml-3 mb-3">--}}
{{--                                            <div class="text-muted">59 minutes ago</div>--}}
{{--                                            <p><a href="" class="text-info">Jessi</a> attended a meeting with<a href="#" class="text-success">John Doe</a>.</p>--}}
{{--                                            <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <!-- settings -->--}}
{{--                            <div id="edit-profile" class="tab-pane">--}}
{{--                                <div class="user-profile-content">--}}
{{--                                    <form action="" method="POST" enctype="multipart/form-data">--}}
{{--                                        {{ csrf_field() }}--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="name">Name:</label>--}}
{{--                                            <input type="text" class="form-control" id="name" name="name" value="">--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="email">Email:</label>--}}
{{--                                            <input type="text" class="form-control" id="email" name="email" value="">--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="pwd">Password:</label>--}}
{{--                                            <input type="password" class="form-control" id="pwd" name="password">--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="title">Công việc:</label>--}}
{{--                                            <textarea class="form-control" name="title"></textarea>--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="description">Mô tả:</label>--}}
{{--                                            <textarea class="form-control" id="contents"  name="description"></textarea>--}}
{{--                                            <script>CKEDITOR.replace('contents');</script>--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="image">Hình ảnh:</label>--}}
{{--                                            <input type="file" class="form-control"name="image" value="" />--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="phone">Phone:</label>--}}
{{--                                            <input type="text" class="form-control"  name="phone" placeholder="số điện thoại" value="">--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="address">Địa chỉ:</label>--}}
{{--                                            <input type="text" class="form-control"  name="address" placeholder="địa chỉ" value="">--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="contact">Liên hệ:</label>--}}
{{--                                            <input type="url" class="form-control"  name="contact" placeholder="liên hệ" value="">--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="exampleInputPassword1">Trạng thái</label>--}}
{{--                                            <select name="status" class="form-control input-sm m-bot15">--}}
{{--                                                <option value="1">Hiển thị </option>--}}
{{--                                                <option value="0">Ẩn</option>--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                        <button type="submit" name="btnregister"class="btn btn-primary">Thực Hiện</button>--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <!-- profile -->--}}
{{--                            <div id="projects" class="tab-pane">--}}
{{--                                <div class="row m-t-10">--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <div class="portlet"><!-- /primary heading -->--}}
{{--                                            <div id="portlet2" class="panel-collapse collapse show">--}}
{{--                                                <div class="portlet-body">--}}
{{--                                                    <div class="table-responsive">--}}
{{--                                                        <table class="table mb-0">--}}
{{--                                                            <thead>--}}
{{--                                                            <tr>--}}
{{--                                                                <th>#</th>--}}
{{--                                                                <th>Project Name</th>--}}
{{--                                                                <th>Start Date</th>--}}
{{--                                                                <th>Due Date</th>--}}
{{--                                                                <th>Status</th>--}}
{{--                                                                <th>Assign</th>--}}
{{--                                                            </tr>--}}
{{--                                                            </thead>--}}
{{--                                                            <tbody>--}}
{{--                                                            <tr>--}}
{{--                                                                <td>1</td>--}}
{{--                                                                <td>Velonic Admin</td>--}}
{{--                                                                <td>01/01/2015</td>--}}
{{--                                                                <td>07/05/2015</td>--}}
{{--                                                                <td><span class="badge badge-info">Work in Progress</span></td>--}}
{{--                                                                <td>Coderthemes</td>--}}
{{--                                                            </tr>--}}
{{--                                                            <tr>--}}
{{--                                                                <td>2</td>--}}
{{--                                                                <td>Velonic Frontend</td>--}}
{{--                                                                <td>01/01/2015</td>--}}
{{--                                                                <td>07/05/2015</td>--}}
{{--                                                                <td><span class="badge badge-success">Pending</span></td>--}}
{{--                                                                <td>Coderthemes</td>--}}
{{--                                                            </tr>--}}
{{--                                                            <tr>--}}
{{--                                                                <td>3</td>--}}
{{--                                                                <td>Velonic Admin</td>--}}
{{--                                                                <td>01/01/2015</td>--}}
{{--                                                                <td>07/05/2015</td>--}}
{{--                                                                <td><span class="badge badge-pink">Done</span></td>--}}
{{--                                                                <td>Coderthemes</td>--}}
{{--                                                            </tr>--}}
{{--                                                            <tr>--}}
{{--                                                                <td>4</td>--}}
{{--                                                                <td>Velonic Frontend</td>--}}
{{--                                                                <td>01/01/2015</td>--}}
{{--                                                                <td>07/05/2015</td>--}}
{{--                                                                <td><span class="badge badge-purple">Work in Progress</span></td>--}}
{{--                                                                <td>Coderthemes</td>--}}
{{--                                                            </tr>--}}
{{--                                                            <tr>--}}
{{--                                                                <td>5</td>--}}
{{--                                                                <td>Velonic Admin</td>--}}
{{--                                                                <td>01/01/2015</td>--}}
{{--                                                                <td>07/05/2015</td>--}}
{{--                                                                <td><span class="badge badge-warning">Coming soon</span></td>--}}
{{--                                                                <td>Coderthemes</td>--}}
{{--                                                            </tr>--}}

{{--                                                            </tbody>--}}
{{--                                                        </table>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div> <!-- /Portlet -->--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

        </div>
        <!-- end row -->

    </div>

@stop
