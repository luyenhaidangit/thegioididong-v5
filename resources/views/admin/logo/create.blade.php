@extends('admin.logo.layout')
@section('create')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <form action="{{ route('logo.store') }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group"
                                     style="margin-bottom: 10px">
                                    <input type="file" onchange="readURL(this);" class="form-control" name="logo_image"
                                           value=""/>
                                </div>
                                <div class="form-group" style="margin-bottom: 10px">
                                    <div class="checkbox checkbox-primary">
                                        <input id="checkbox0" type="checkbox" checked>
                                        <label for="checkbox0">
                                            Hiển thị
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group" style="margin-bottom: 10px">
                                <button type="submit" name="btn_logo" class="btn btn-primary">Thực Hiện</button>
                                <button type="reset" class="btn btn-secondary waves-effect waves-light">
                                    Cancel
                                </button>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-3">
                            <div class="image-crop-preview clearfix">
                                <div class="img-container">
                                    <img id="blah" src="{{asset('admin\assets\images\img_1.jpg')}}"
                                         alt="your image" style="width: 100%;height: 60px;"/>
                                </div>
                            </div>

                            <div class="docs-data">
                                <div class="input-group mt-2">
                                    <span class="input-group-prepend">
                                        <label class="input-group-text width-xs" for="dataWidth">Width</label>
                                    </span>
                                    <input type="text" class="form-control" id="dataWidth" style="text-align: center;"
                                           value="235">
                                    <span class="input-group-append">
                                        <span class="input-group-text">px</span>
                                    </span>
                                </div>
                                <div class="input-group mt-2">
                                                        <span class="input-group-prepend">
                                                            <label class="input-group-text width-xs" for="dataHeight">Height</label>
                                                        </span>
                                    <input type="text" class="form-control" id="dataHeight" value="60"
                                           style="text-align: center;">
                                    <span class="input-group-append">
                                                            <span class="input-group-text">px</span>
                                                        </span>
                                </div>
                            </div> <!-- end .doc-data -->
                        </div>
                    </div><!--end row-->
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    <!--end row-->
@stop

