@extends('admin.contact.layout')
@section('content')
    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
        <thead>
        <th>Tên</th>
        <th>Email </th>
        <th>Tiêu đề</th>
        <th>Bình luận</th>
        <th>Option</th>
{{--        <th>Edit</th>--}}
{{--        <th>Lock</th>--}}
{{--        <th>Delete</th>--}}
        </thead>
        <tbody>
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif
        @foreach($contacts as $contact)
            <tr>
                <td width="5%">{{$contact->contacts_name}} </td>
                <td>{{$contact->contacts_email}}</td>
                <td>{{$contact->contacts_title}}</td>
                <td>{{$contact->contacts_comment}}</td>
                <td>

                    <form action="{{route('contact.destroy', $contact->contacts_id)}}" method="POST">
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
