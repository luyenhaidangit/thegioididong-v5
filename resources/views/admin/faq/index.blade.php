@extends('admin.faq.layout')
@section('content')

    @foreach($faqs as $faq)
        <div class="modal fade" id="exampleModal{{$faq->faq_id}}" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Chi tiết câu hỏi
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                </thead>
                                <tbody>
                                <tr>
                                    <th style="width:200px">Tiêu đề: </th>
                                    <td width="500px" style="white-space: normal">{{$faq->faq_title}}</td>
                                </tr>

                                <tr>
                                    <th>Mô tả : </th>
                                    <td>{!! $faq->faq_description !!}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
    @endforeach

    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
        <thead>
        <th> Số thứ tự </th>
        <th>Tiêu đề </th>
        <th>Trạng Thái</th>
        <th>Xem chi tiết</th>
        <th>Sửa</th>
        <th>Xóa</th>
        </thead>
        <tbody>
        @foreach($faqs as $key => $faq)
            <tr>
                <td width="5%" >{{ $key +1  }} </td>
                <td width="400px" style="white-space: normal" >{!! $faq->faq_title !!} </td>
                <td>
                    @if($faq->status==1)
                        <a href="{{route('faq.changestatus',$faq->faq_id)}}" class="btn btn-success"><i
                                    class="fa fa-unlock"></i></a>
                    @else
                        <a href="{{route('faq.changestatus',$faq->faq_id)}}" class="btn btn-warning"> <i
                                    class="fa fa-lock"></i></a>
                    @endif
                    </td>
                <td>
                    <button class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal{{$faq->faq_id}}"><i class="fa fa-eye"></i></button>
                </td>
                <td><a href="{{route('faq.edit', $faq->faq_id)}}" class="btn btn-primary"><i
                                class="fa fa-edit"></i></a></td>
                <td>
                    <form action="{{route('faq.destroy', $faq->faq_id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
{{----}}
@stop
